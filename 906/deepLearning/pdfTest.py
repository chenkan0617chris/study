import os
import openai
import sys
from langchain.document_loaders import PyPDFLoader
from langchain.text_splitter import RecursiveCharacterTextSplitter, CharacterTextSplitter
from langchain.embeddings.openai import OpenAIEmbeddings
from langchain.vectorstores import Chroma
import numpy as np

sys.path.append('../..')

from dotenv import load_dotenv, find_dotenv
_ = load_dotenv(find_dotenv()) # read local .env file

openai.api_key  = os.environ['OPENAI_API_KEY']


# pdf functionality
loader = PyPDFLoader("C://Users/chenk/OneDrive/桌面/study/906/deepLearning/Reference-1.pdf")
pages = loader.load()

r_splitter = RecursiveCharacterTextSplitter(
    chunk_size=1500,
    chunk_overlap=150, 
    separators=["\n\n", "\n", "(?<=\. )" " ", ""]
)

splits = r_splitter.split_documents(pages)


embedding = OpenAIEmbeddings()

sentence1 = "i like dogs"
sentence2 = "i like canines"
sentence3 = "the weather is ugly outside"

embedding1 = embedding.embed_query(sentence1)
embedding2 = embedding.embed_query(sentence2)
embedding3 = embedding.embed_query(sentence3)

persist_directory = 'docs/chroma/'

vectordb = Chroma.from_documents(
    documents=splits,
    embedding=embedding,
    persist_directory=persist_directory
)

print(vectordb._collection.count())

question = "is there an email i can ask for help"

docs = vectordb.similarity_search(question,k=3)

print(docs[0].page_content)

vectordb.persist()






# youtube functionality 
# from langchain.document_loaders.generic import GenericLoader
# from langchain.document_loaders.parsers import OpenAIWhisperParser
# from langchain.document_loaders.blob_loaders.youtube_audio import YoutubeAudioLoader

# url="https://www.youtube.com/watch?v=jW67NLlJSwE"
# save_dir="docs/youtube/"
# loader = GenericLoader(
#     YoutubeAudioLoader([url],save_dir),
#     OpenAIWhisperParser()
# )
# docs = loader.load()
# print(docs[0].page_content[0:500])