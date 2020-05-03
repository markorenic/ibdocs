import selenium
import requests
import pickle
import json
import sys
import os
from bs4 import BeautifulSoup

sys.setrecursionlimit(5000)
qBank = []

url = 'https://www.ibdocuments.com/IB%20QUESTIONBANKS/4.%20Fourth%20Edition/questionbank.ibo.org/en/teachers/00000/questionbanks/46-dp-physics/syllabus_sections/2595.html'

#parse url
def parsePage(url):
    page = requests.get(url)
    soup = BeautifulSoup(page.text, 'html.parser')
    return soup

#sorts questions from topic page to MCQ and other
def sort_questions(url):
    soup = parsePage(url)
    questions = soup.findAll('ul')
    allQuestions = []
    mcq = []
    laq = []
    for ultag in soup.find_all('ul', {'class': ''}):
        for litag in ultag.find_all('li'):
            allQuestions.append((litag))

    for i in range (0,len(allQuestions)):
        if allQuestions[i].text[5] == '1':
            mcq.append(allQuestions[i])
        else:
            laq.append(allQuestions[i])
    return mcq, laq

#get link of each MCQ from topic page
def getquestionspertopic(url):
    linkBank = []
    mcq, laq = sort_questions(url)

    for i in mcq:
        link = i.find(href=True)
        link = str(link.attrs['href'])[2:]
        q_url = url.split('/syllabus')[0] + link
        linkBank.append(q_url)
    return linkBank

#Question OBJ
class Question:
    def __init__(self, ref, question, answer):
        self.ref = ref
        self.question = question
        self.answer = answer

#save question object into qBank
def newQuestion(url):
    soup = parsePage(url)
    ref = soup.findAll(class_ = 'info_value')[2]
    question_master = soup.findAll(class_ = 'question')
    question = question_master[0]
    for x in range(len(question.contents)):
        if "img" in str(question.contents[x]):
            question.contents[x] = str(question.contents[x]).replace("../../../../../../..","https://www.ibdocuments.com/IB%20QUESTIONBANKS/4.%20Fourth%20Edition")
    answer = question_master[1]
    #print('Found new Question!: ', str(question.text))
    qBank.append(Question(ref, question, answer))

#get the thingy
linkBank = getquestionspertopic(url)
for i in range(0, len(linkBank)):
    newQuestion(linkBank[i])

pickle_out = open('dict.pickle','wb')
pickle.dump(qBank, pickle_out)
pickle_out.close()

#load questions
# pickle_in = open('dict.pickle','rb')
# qBank = pickle.load(pickle_in)

#works outputs the HTML OF THE QUESTION
# question_html = str(0)
#for i in range(0,len(qBank[0].question.contents)):
#    question_html = question_html + (str(qBank[0].question.contents[i]))


def exportQuestions(qBank):
    counter = 0
    for counter in range(0, len(qBank)):
        # open a (new) file to write
        question_html = str(str(qBank[counter].ref)+"<data id='answer' value="+str(qBank[counter].answer)[26]+"></data>")
        questionID = (str(qBank[counter].ref)[23:38].replace('.', ''))
        questionID = str(questionID+'.html')
        questionID = (questionID.replace('<', ''))
        for i in range(0, len(qBank[counter].question.contents)):
            question_html = str(question_html + (str(qBank[counter].question.contents[i])))
        
        file_ = open(questionID, 'w')
        try:
            file_.write(question_html)
        except:
            file_.close()
            print('Question {0} not compatible.'.format(questionID))
            print(qBank[counter].question.contents[i])
        
        file_.close()
