import os
from langchain.llms import OpenAI

os.environ["OPENAI_API_KEY"] = "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"
os.environ["SERPAPI_API_KEY"] = "0f5efb63603d77332d3fc96057d03fcffd066127b200a4c607ce97bd26736ddc"
from langchain.prompts import PromptTemplate

from langchain.agents import load_tools
from langchain.agents import initialize_agent
from langchain.agents import AgentType
 
prompt = PromptTemplate(
    input_variables=["product"],
    template="What is a good name for a company that makes {product}?",
)

print(prompt.format(product="desk"))


llm = OpenAI(temperature=0)

text = "What would be a good company name for a company that makes colorful socks?"
print(llm(text))

llm = OpenAI(temperature=0)
tools = load_tools(["serpapi", "llm-math"], llm=llm)

agent = initialize_agent(tools, llm, agent=AgentType.ZERO_SHOT_REACT_DESCRIPTION, verbose=True)

agent.run("1+1?")


