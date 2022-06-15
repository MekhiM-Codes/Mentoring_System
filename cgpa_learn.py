#CGPA prediction using MLPRegressor
#CGPA for each semester must be contructed
#==============================================
"""
Requirements:
1. cgpa_data.csv which contains simple data of CGPA history for each semester up to semester 8
2. Column in csv file: ["S1", "S2", "S3", "S4", "S5", "S6"]
"""

from sklearn.neural_network import MLPRegressor
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
import pandas as pd
import numpy as np
import pickle

def buildModel(sem, col):
    #read data
    df = pd.read_csv('cgpa_data.csv')
    #Build setting based on sem learning
    
    y = df.loc[:,col] #assign class to learn/predict
    X = df.drop(df.iloc[:, sem-1:6], axis = 1)
    X_train, X_test, y_train, y_test = train_test_split(X, y,test_size=0.2)

    model = MLPRegressor(random_state=1, max_iter=500).fit(X_train, y_train)
    print(model.predict(X_test))
    print("Accuracy: " + str(model.score(X_test, y_test)))

    #save model
    filename = 'model'+ str(sem) + '.sav'
    pickle.dump(model, open(filename, 'wb'))

#=============================================================
#build model based on semester
#modify variables below to get model for each semester
#=============================================================
sem = 7 #predict this semester
col = 'S7' #value to predict based on this column
buildModel(sem, col)