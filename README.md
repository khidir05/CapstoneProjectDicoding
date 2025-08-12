
# 💻 Expert System Website for Facial Skin Disease Diagnosis  
**Coding Camp 2025 – DBS Foundation x Dicoding**  
Team ID: **CC25-CF022**  
Project Category: **Health Technology**

## IMPORTANT !!! ##
Before you start the website, please download the dermacare_db (for website) and machine learning model file from the following link:
Download ML Model (https://drive.google.com/drive/folders/1_Am_VHZZbdM_YVPDWknVEsx0Jf-ME1WZ?usp=sharing)

## 🧠 Overview  
Skin diseases such as acne, eczema, and rosacea often go undetected in their early stages due to limited access to dermatology services, especially in remote areas of Indonesia. Our project introduces a web-based expert system that leverages machine learning (ML) to help users diagnose facial skin diseases through image classification.  

By uploading a photo of their face, users can instantly receive a diagnosis along with simple health education and early treatment suggestions. This tool is designed to support communities with low technological literacy and limited access to dermatologists.

## 🎯 Problem Statement  
Due to heat, pollution, and a lack of public understanding of dermatological health, many people experience delays in getting proper diagnosis and treatment. This can worsen skin conditions and increase healthcare costs.  

Our solution addresses the question:  
**"How can we develop an intelligent, web-based system to help users diagnose facial skin diseases quickly and accurately from images?"**

## 🔍 Research Questions  
1. How to design and build a web-based expert system for facial skin disease diagnosis?  
2. What common symptoms can be used as parameters in the expert system?  
3. How accurate is the system compared to certified dermatologists?  
4. How useful is this system for non-medical users?

## 👥 Team Members  
| Role              | Name                          | University                          |
|------------------|-------------------------------|--------------------------------------|
| Machine Learning | Muhamad Fikri Ardani          | Universitas Airlangga                |
| Machine Learning | Dillan Engelbert Hendrarto    | Universitas Kristen Petra            |
| Machine Learning | Aufar Raihan Rahmat           | Universitas Airlangga                |
| Frontend & Backend | Muhammad Alvin Maulana        | Universitas Airlangga                |
| Frontend & Backend | Khidir Afwan Amlabar          | Politeknik Negeri Cilacap            |

## 🛠 Technologies Used  
- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** Laravel, RESTful API  
- **Database:** MongoDB  
- **AI/ML:** Python, Scikit-learn, OpenCV, TensorFlow, Keras  
- **Model:** Random Forest Classifier + HOG features  
- **Tools:** Vercel, GitHub, VSCode, Figma, Zoom, Discord

## 🔍 How It Works  
1. User uploads a facial image.  
2. Image is preprocessed using OpenCV and HOG (Histogram of Oriented Gradients).  
3. The ML model classifies the image into skin disease categories.  
4. System returns the diagnosis with confidence level and skin health tips.  

## 📦 Features  
- Instant skin disease detection via image upload  
- Clear visual results and user-friendly explanations  
- Login/logout and history tracking  
- Preventive skincare tips for each diagnosed condition  
- Responsive UI for desktop and mobile

## 🧪 AI/ML Pipeline  
- Image normalization & augmentation  
- Feature extraction via `skimage.hog`  
- Model training with RandomForestClassifier  
- Model saved via `joblib` and served via FastAPI  
- Confidence score returned alongside label  

## 🗂 Project Timeline  
| Phase                   | Duration              |
|------------------------|-----------------------|
| Planning               | Mar 20 – Apr 20, 2025 |
| Design & System Plan   | Apr 21 – May 5, 2025  |
| MVP Development        | May 6 – Jun 13, 2025  |
| Testing & QA           | Jun 13 – Jun 18, 2025 |
| Final Delivery         | Jun 18 – Jun 20, 2025 |

## ⚠️ Risks & Mitigation  
- **Data quality:** We use public datasets (e.g., Kaggle) and perform preprocessing & augmentation.  
- **Model accuracy:** Targeting >90% accuracy with validation and tuning.  
- **Integration delays:** Early backend-ML coordination with fixed API spec.  
- **Infrastructure limitations:** Optimize model via compression; explore cloud options if needed.

## 🙌 Support Needed  
- Mentors for ML (esp. medical image classification) and full-stack web development  
- GPU access (e.g., Google Colab Pro)  
- Reliable cloud storage for datasets & models  

## 📌 Final Note  
This project is built not only to showcase technical skills, but also to provide **real impact** by helping underserved communities detect and understand skin conditions early. With inclusivity, simplicity, and innovation, we hope to bring dermatological awareness to a wider audience across Indonesia.
