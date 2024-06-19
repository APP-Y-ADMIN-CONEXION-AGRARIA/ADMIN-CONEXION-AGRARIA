const firebaseConfig = {
    apiKey: "AIzaSyDSe_2lz8x6UVV5gcLGuLD0aguzc3voMqY",
    authDomain: "conexion-agraria.firebaseapp.com",
    databaseURL: "https://conexion-agraria-default-rtdb.firebaseio.com",
    projectId: "conexion-agraria",
    storageBucket: "conexion-agraria.appspot.com",
    messagingSenderId: "875677956740",
    appId: "1:875677956740:web:a66b0f292ae7d70608a0d1"
  };

// Inicializa Firebase
firebase.initializeApp(firebaseConfig);

// Obtén una referencia al servicio de almacenamiento de Firebase
const storage = firebase.storage();
