#!C:\Users\celeron\AppData\Local\Programs\Python\Python39/python.exe    
print ("Content-type: text/php\n\n");    
                               
import cgi
from configparser import ConfigParser        
import pandas as pd
import numpy as np
import pickle

form = cgi.FieldStorage()       #mesti ada

matricno = form.getvalue("matric_number")     #ambk input dri php
sem1gpa = form.getvalue("sem1_gpa")     #ambk input dri php
sem2gpa = form.getvalue("sem2_gpa")     #ambk input dri php
sem3gpa = form.getvalue("sem3_gpa")     #ambk input dri php
sem4gpa = form.getvalue("sem4_gpa")     #ambk input dri php
sem5gpa = form.getvalue("sem5_gpa")     #ambk input dri php
sem6gpa = form.getvalue("sem6_gpa")     #ambk input dri php

def predict(sem, Xnew):

    filename = 'model'+str(sem)+'.sav'
    #load model
    model = pickle.load(open(filename, 'rb'))
    #print(" Predicted CGPA: ", model.predict(Xnew))
    results = model.predict(Xnew)
    return results

#sample==========================================================
#predict new data - predict sem7 cgpa

numpy_array = np.array([[sem1gpa,  sem2gpa,  sem3gpa,  sem4gpa,  sem5gpa,  sem6gpa]])
Xnew = pd.DataFrame(numpy_array)
cgpa = predict(7,Xnew)
cgpa = np.round_(cgpa,2)
result = cgpa[0]
print("Predicted CGPA: ", result)

import mysql.connector

mydb = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "fki_mentorship"
)

mycursor = mydb.cursor()

sql = "INSERT INTO target (targetID, matric_number, target_cgpa) VALUES (%s, %s, %s)"
id = 0
matnum = matricno
val = (id,matnum,result)
mycursor.execute(sql, val)

print("Inserted value into the database: ",val)
mydb.commit()
print("Your cgpa has been saved into the database.")
