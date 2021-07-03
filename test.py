#!D:/python directory 3.9/python.exe
print("content-type: text/html\n\n" )
from difflib import SequenceMatcher
with open('rash.docx', errors='ignore') as file_1,open('cash.docx', errors='ignore') as file_2:
    file_1_data = file_1.read()
    file_2_data = file_2.read()
    similarity = SequenceMatcher(None, file_1_data,file_2_data).ratio()
    if similarity>0.8:
        print( "Copyright ! The Plagiarism is ",similarity*100)
        print("This is not acceptable")
    else:
        print(similarity*100)
        print("Great Work !!")
