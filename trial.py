import google.generativeai as genai

genai.configure(api_key="AIzaSyB273ltH5dMtR2YnF1-RxI3tVlNs2X5GVk")

# Set up the model
generation_config = {
  "temperature": 0.9,
  "top_p": 1,
  "top_k": 0,
  "max_output_tokens": 8192,
}

safety_settings = []

model = genai.GenerativeModel(model_name="tunedModels/cuea-ihub-internship--attachment-applic",
                              generation_config=generation_config,
                              safety_settings=safety_settings)

prompt_parts = []

response = model.generate_content(prompt_parts)
print(response.text)
