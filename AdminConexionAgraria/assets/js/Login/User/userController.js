import {
  createUserWithEmailAndPassword,
  sendPasswordResetEmail,
  signInWithEmailAndPassword,
} from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { auth } from "../app/firebase.js";
import * as FunApp from "../app/functions.js";

/**Define */
const idInputPasswordRP = "repeatPassword";
const idInputPassword = "password";
const btnPasswordRP = document.getElementById("btn-passwordRP");
const btnPassword = document.getElementById("btn-password");
const objForm = document.getElementById("formUser");
const objFormPasswordRecover = document.getElementById("formPasswordRecover");
const objFormLogin = document.getElementById("formLogin");

if (btnPassword)
  btnPassword.addEventListener("click", (e) => {
    FunApp.viewText(idInputPassword);
  });

if (btnPasswordRP)
  btnPasswordRP.addEventListener("click", (e) => {
    FunApp.viewText(idInputPasswordRP);
  });

if (objForm)
  objForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let jsonUser = FunApp.sendData(objForm.id);
    if (
      typeof jsonUser.password !== "undefined" &&
      typeof jsonUser.user !== "undefined"
    ) {
      try {
        let pass = jsonUser.password;
        let user = jsonUser.user.toLowerCase();
        const userCredentials = await createUserWithEmailAndPassword(
          auth,
          user,
          pass
        ).then((data) => {
          alert("User Created");
          FunApp.cleanForm(objForm);
        });
      } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.error(errorCode);
        console.error(errorMessage);
        alert("Validate the data entered");
      }
    } else {
      alert("Validate the data entered");
    }
  });

if (objFormPasswordRecover)
  objFormPasswordRecover.addEventListener("submit", async (e) => {
    e.preventDefault();
    let jsonUser = FunApp.sendData(objFormPasswordRecover.id);

    if (typeof jsonUser.user !== "undefined") {
      try {
        let user = jsonUser.user.toLowerCase();
        const userCredentials = await sendPasswordResetEmail(auth, user).then(
          (data) => {
            console.log(data);
            alert("Password reset email sent!");
            FunApp.cleanForm(objFormPasswordRecover);
          }
        );
        console.log(userCredentials);
      } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.error(errorCode);
        console.error(errorMessage);
        alert("Validate the data entered");
      }
    } else {
      alert("Validate the data entered");
    }
  });

if (objFormLogin) {
  objFormLogin.addEventListener("submit", async (e) => {
    e.preventDefault();
    let jsonUser = FunApp.sendData(objFormLogin.id);
    if (
      typeof jsonUser.password !== "undefined" &&
      typeof jsonUser.user !== "undefined"
    ) {
      try {
        let pass = jsonUser.password;
        let user = jsonUser.user.toLowerCase();
        const userCredentials = await signInWithEmailAndPassword(
          auth,
          user,
          pass
        ).then(async (userCredential) => {
          console.log(userCredential.user);

          // Obtener el token de Firebase
          const tokenResponse = await fetch(
            "assets/js/Login/User/generate_jwt.php",
            {
              method: "POST",
              headers: {
                "Content-Type": "application/x-www-form-urlencoded",
              },
              body: new URLSearchParams({ userEmail: user }),
            }
          );

          if (!tokenResponse.ok) {
            throw new Error("Failed to obtain Firebase token");
          }

          const tokenData = await tokenResponse.json();
          const firebaseToken = tokenData.token;
          console.log("Firebase Token:", firebaseToken);

          // Aquí puedes almacenar el token de Firebase en localStorage
          localStorage.setItem("firebaseToken", firebaseToken);

          window.location.href = "?c=users&m=index";
        });
      } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.error(errorCode);
        console.error(errorMessage);
        alert("Validate the data entered");
      }
    } else {
      alert("Validate the data entered");
    }
  });
}
