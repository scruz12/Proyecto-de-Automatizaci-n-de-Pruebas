import time

from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By


# create webdriver object

def browser_function1():
    driver_path = "c:\webdrivers\chromedriver.exe"
    chr_options = Options()
    chr_options.add_experimental_option("detach", True)
    chr_driver = webdriver.Chrome(driver_path, options=chr_options)
    chr_driver.get("http://localhost/EDUS")
    chr_driver.maximize_window()




##Buscamos el boton de login para verificar que el usuario exista en EDUS

    time.sleep(10)
    element = chr_driver.find_element(By.XPATH,'//*[@id="btn_Login"]')
    element.click()

##Buscamos el campo del correo para ingresar
    time.sleep(3)
    correo = chr_driver.find_element(By.XPATH,'//*[@id="correo"]')
    correo.click()
    correo.send_keys("correo@correo.com")

    #Cambiar el focus


##Buscamos el campo de contrasena para ingresar
    ##Caso con la contrasena erronea, hay validacion de paso

    time.sleep(3)
    clave = chr_driver.find_element(By.XPATH,'//*[@id="clave"]')
    clave.click()
    clave.send_keys("12548")

##Damos click al boton de iniciar sesion
    time.sleep(5)
    boton = chr_driver.find_element(By.ID,'botonInicio')
    boton.click()
    alert = chr_driver.switch_to.alert
    alert.accept()
    print("La clave es incorrecta, intente de nuevo")

##Reintentamos el login con la clave correspondiente
    time.sleep(3)
    clave2 = chr_driver.find_element(By.XPATH,'//*[@id="clave"]').clear()
    clave2 = chr_driver.find_element(By.XPATH, '//*[@id="clave"]')
    clave2.click()
    clave2.send_keys("123")
##Damos click al boton de iniciar sesion
    time.sleep(5)
    boton = chr_driver.find_element(By.ID,'botonInicio')
    boton.click()
    alert = chr_driver.switch_to.alert
    alert.accept()

    print("Inicio con exito")

##Cierre de sesion
    time.sleep(5)
    boton = chr_driver.find_element(By.ID,'btn_cierre')
    boton.click()

##Inicio y cierre de sesion exitoso


browser_function1()

