import { GoogleGenerativeAI } from "@google/generative-ai";

const API_KEY = "AIzaSyB273ltH5dMtR2YnF1-RxI3tVlNs2X5GVk"; // Replace with your API key
const genAI = new GoogleGenerativeAI(API_KEY);

async function run() {
  // Load a fine-tuned model suitable for disaster management topics
  const model = genAI.getGenerativeModel({ model: "tunedModels/cuea-ihub-internship--attachment-applic" });

  // Define a conversation context related to disaster management
  const context = [
    {
      role: "user",
      parts: [{ text: "We have received reports of flooding in the area." }],
    },
    {
      role: "model",
      parts: [{ text: "Thank you for notifying us. Please provide more details about the affected areas." }],
    },
  ];

  // Start the chat with the defined context
  const chat = model.startChat({
    history: context,
    generationConfig: {
      maxOutputTokens: 100,
    },
  });

  // Define a prompt related to disaster management
  const prompt = "What are the immediate actions we should take to address the flooding situation?";

  // Send the prompt to the model and receive the response
  const result = await chat.sendMessage(prompt);
  const response = await result.response;
  const text = response.text();

  // Log the generated response
  console.log(text);
}

run();
