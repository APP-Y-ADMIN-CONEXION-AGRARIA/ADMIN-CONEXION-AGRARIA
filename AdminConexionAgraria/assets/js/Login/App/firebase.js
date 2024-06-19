// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDSe_2lz8x6UVV5gcLGuLD0aguzc3voMqY",
  authDomain: "conexion-agraria.firebaseapp.com",
  databaseURL: "https://conexion-agraria-default-rtdb.firebaseio.com",
  projectId: "conexion-agraria",
  storageBucket: "conexion-agraria.appspot.com",
  messagingSenderId: "875677956740",
  appId: "1:875677956740:web:a66b0f292ae7d70608a0d1"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);