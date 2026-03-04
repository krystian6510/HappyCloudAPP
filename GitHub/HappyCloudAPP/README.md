# HappyCloudAPP

HappyCloudAPP is a modern weather web application built with PHP, HTML, CSS and JavaScript.  
It provides real-time weather data using the OpenWeather public API.

# Features:

- Current weather data for any city
- 1-day weather forecast
- Search history (stored in session)
- Dark / Light mode toggle
- Loading state before data fetch
- Error handling (invalid city, API issues)
- Responsive design (mobile-friendly)
- Secure API key handling via `.env`
- Clean and modular project structure

---

# Technologies Used:

- PHP (backend logic, API integration)
- HTML5
- CSS3 (CSS Grid, responsive layout)
- JavaScript (UI interactions, dark mode)
- OpenWeather API (v2.5)

---

# How to Run the Project
Follow these steps to run HappyCloudAPP locally.

---

# Install XAMPP

Download and install XAMPP:
https://www.apachefriends.org/

After installation:
- Open XAMPP Control Panel
- Start **Apache**

---

# Clone the Repository

Open terminal (or Git Bash) and run:

git clone [https://github.com/your-username/HappyCloudAPP.git](https://github.com/krystian6510/HappyCloudAPP/tree/main/GitHub/HappyCloudAPP)

Then move the project folder to:

xampp/htdocs/

Your final path should look like:

xampp/htdocs/HappyCloudAPP

---

# Create Your API Key

1. Go to: https://openweathermap.org/
2. Create a free account
3. Go to your profile → API keys
4. Copy your generated key

---

# Create .env File

Inside the main project folder HappyCloudAPP/ create a file named:

.env

Add:

API_KEY=your_api_key_here  
API_BASE_URL=https://api.openweathermap.org/data/2.5/  
UNITS=metric  

Save the file.

Make sure `.env` is listed in `.gitignore`.

---

# Open the Application

Open your browser and go to:

http://localhost/HappyCloudAPP

The application should now be running.
