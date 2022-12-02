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


##TEST CASE 2
##INSERCION DE CITAS A LA BD DE PHP

##CLICK EN EL BOTON DE SACAR CITA
    time.sleep(5)
    botonCita = chr_driver.find_element(By.ID,'btn_sacarCita')
    botonCita.click()

##llenamos los campos || Cedula
    time.sleep(3)
    campoCedula = chr_driver.find_element(By.ID,'cedula')
    campoCedula.click()
    campoCedula.send_keys("118050439")

##llenamos los campos || Correo
    time.sleep(3)
    campoCorreo = chr_driver.find_element(By.ID,'correo')
    campoCorreo.click()
    campoCorreo.send_keys("correo@correo.com")

##llenamos los campos || Fecha
    time.sleep(3)
    campoFecha = chr_driver.find_element(By.ID,'fecha')
    campoFecha.click()
    campoFecha.send_keys("2022/12/03")

##llenamos los campos || Hora
    time.sleep(3)
    campoHora = chr_driver.find_element(By.ID,'txt_hora')
    campoHora.click()
    campoHora.send_keys("8")

##llenamos los campos || Centro
    time.sleep(3)
    campoCentro = chr_driver.find_element(By.ID,'centro')
    campoCentro.click()
    campoCentro.send_keys("San Juan")

##Click en el boton de guardar || Registrar
    time.sleep(3)
    botonGuardar = chr_driver.find_element(By.ID,'btnIngresar')
    botonGuardar.click()


##TEST CASE
    ##VISUALIZAR CITAS
    time.sleep(3)
    chr_driver.execute_script("window.scrollTo(0,500)")
    time.sleep(15)




##TEST CASE 3
##ACTUALIZAR CITA

##click al boton de actualizar

    chr_driver.execute_script("window.scrollTo(0,9000)")
    time.sleep(3)
    botonActualizar = chr_driver.find_element(By.XPATH,'//*[@id="BodyCitas"]/tr[1]/td[6]/a')
    botonActualizar.click()

##Modificamos la fecha de la cita
    time.sleep(3)
    campoHora = chr_driver.find_element(By.ID,'fecha').clear()
    campoHora = chr_driver.find_element(By.ID, 'fecha')
    campoHora.click()
    campoHora.send_keys("2022/12/16")

##Finalizamos la actualizacion
    time.sleep(3)
    botonActualizar2 = chr_driver.find_element(By.ID,'btnActualizar')
    botonActualizar2.click()


##TEST CASE 4
##ELIMINAR CITA

##click al boton de actualizar
    time.sleep(3)
    chr_driver.execute_script("window.scrollTo(0,500)")
    time.sleep(3)
    botonActualizar = chr_driver.find_element(By.XPATH,'//*[@id="BodyCitas"]/tr[1]/td[6]/a')
    botonActualizar.click()

##Click al boton de eliminar
    time.sleep(3)
    botonEliminar = chr_driver.find_element(By.ID,'btnCancelar')
    botonEliminar.click()
    time.sleep(2)
    chr_driver.execute_script("window.scrollTo(0,500)")
    time.sleep(10)

##Cita cancelada correctamente

##Regresamos al menu principal
    chr_driver.execute_script("window.scrollTo(0,0)")
    time.sleep(3)
    botonRegresar = chr_driver.find_element(By.XPATH,'//*[@id="why-us"]/div/div/div/div/div/a')
    botonRegresar.click()

browser_function()