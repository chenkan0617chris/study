import os
import openai
import sys
sys.path.append('../..')

from dotenv import load_dotenv, find_dotenv
_ = load_dotenv(find_dotenv()) # read local .env file

openai.api_key  = os.environ['OPENAI_API_KEY']

print(openai.api_key)

# from langchain.document_loaders import PyPDFLoader
# loader = PyPDFLoader("docs/cs229_lectures/MachineLearning-Lecture01.pdf")
# pages = loader.load()


# from langchain.document_loaders import WebBaseLoader

# loader = WebBaseLoader("https://github.com/basecamp/handbook/blob/master/37signals-is-you.md")

# docs = loader.load()

# print(docs[0].page_content[:500])

# from langchain.document_loaders import PyPDFLoader
# loader = PyPDFLoader("https://moodle.uowplatform.edu.au/pluginfile.php/4182346/mod_resource/content/4/Lecture_week2.pdf")
# pages = loader.load()