import time

from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By

# create webdriver object
driver = webdriver.Chrome()

def browser_function():
    driver_path = "c:\webdrivers\chromedriver.exe"
    chr_options = Options()
    chr_options.add_experimental_option("detach", True)
    chr_driver = webdriver.Chrome(driver_path, options=chr_options)
    chr_driver.get("http://localhost/EDUS/index2.html")
    chr_driver.maximize_window()

##Aprovechando que estamos fuera de sesion
##TEST CASE #1
##Enviar un mensaje de contacto a la pagina || Si funciona, una alerta deberia saltar diciendo que el mensaje se envio correctamente ||
##Si un campo esta sin llenar la validacion va a saltar

##Llenamos el campo de nombre
    chr_driver.execute_script("window.scrollTo(0,9000)")

    time.sleep(5)
    nombreMensaje = chr_driver.find_element(By.ID,'name')
    nombreMensaje.click()
    nombreMensaje.send_keys("Nombre")
    time.sleep(3)

##LLenamos el campo de correo
    time.sleep(3)
    correoMensaje = chr_driver.find_element(By.XPATH,'//*[@id="email"]')
    correoMensaje.click()
    correoMensaje.send_keys("correo@correo.com")
##LLenamos el campo de asunto
    time.sleep(3)
    asuntoMensaje = chr_driver.find_element(By.XPATH,'//*[@id="subject"]')
    asuntoMensaje.click()
    asuntoMensaje.send_keys("Asunto Dummy")
##LLenamos el campo de mensaje
    time.sleep(3)
    contenidoMensaje = chr_driver.find_element(By.ID,'txt_mensaje')
    contenidoMensaje.click()
    contenidoMensaje.send_keys("Contenido de Mensaje")
##Click al boton de enviar
    time.sleep(3)
    botonEnviar = chr_driver.find_element(By.ID,'botonEnviar')
    botonEnviar.click()
    alert = chr_driver.switch_to.alert
    alert.accept()
    print("mensaje enviado exitosamente | Test pasado")


browser_function()