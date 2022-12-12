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




##TEST CASE #4
##ACTIVAR UNA RECETA EN EL SISTEMA Y QUE SE MUESTRE EL HISTORIAL DE RECETAS ACTIVADAS ANTES
##-----------------------------------------------------------------------------------------

    time.sleep(5)
    gotoRecetas = chr_driver.find_element(By.XPATH,'//*[@id="navbar"]/ul/li[6]/a')
    gotoRecetas.click()
    time.sleep(3)

##SE LLENAN LOS CAMPOS REQUERIDOS
##-----------------------------------------------------------

    time.sleep(3)
    gotoCedula = chr_driver.find_element(By.ID,'cedula')
    gotoCedula.click()
    gotoCedula.send_keys("118050439")
    time.sleep(3)

##Nombre
##-----------------------------------------------------------

    time.sleep(3)
    gotoNombre = chr_driver.find_element(By.ID,'nombre')
    gotoNombre.click()
    gotoNombre.send_keys("Oscar")
    time.sleep(3)

##Apellidos
##-----------------------------------------------------------

    time.sleep(3)
    gotoApellidos = chr_driver.find_element(By.ID,'apellidos')
    gotoApellidos.click()
    gotoApellidos.send_keys("Navarro")
    time.sleep(3)

##Fecha
##-----------------------------------------------------------

    time.sleep(3)
    gotoApellidos = chr_driver.find_element(By.ID,'fecha')
    gotoApellidos.click()
    gotoApellidos.send_keys("12/11/2022")
    time.sleep(3)

##Lugar
##---------------------------------------------------------------

    time.sleep(3)
    select = chr_driver.find_element(By.ID,'centro')
    select.click()
    select.send_keys("EBAIS")

##Click
##----------------------------------------------------------------

    guardarBoton = chr_driver.find_element(By.ID,'btnIngresar')
    guardarBoton.click()

    print("Receta agregada correctamente")

#REVISAR LA INFO
    # tablaContenido = chr_driver.find_element(By.XPATH,'//*[@id="BodyRecetas"]')
    # print("Hay datos")
    # tablaContenido.click()
    # time.sleep(5)

    print("No hay datos en pantalla, error de conexion")






browser_function()
