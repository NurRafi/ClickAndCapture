from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from webdriver_manager.chrome import ChromeDriverManager

options = Options()
options.headless = False
driver = webdriver.Chrome(ChromeDriverManager().install(), options=options)
driver.get("http://localhost/SE/")

driver.find_element_by_id("photographer").click()

driver.find_element_by_id("signup").click()

driver.find_element_by_id("id_signup").send_keys("2")
driver.find_element_by_id("username_signup").send_keys("Test")
driver.find_element_by_id("email_signup").send_keys("test@gmail.com")
driver.find_element_by_id("password_signup").send_keys("123")
driver.find_element_by_id("phone_signup").send_keys("123")
driver.find_element_by_id("area_signup").send_keys("Mohammadpur")
driver.find_element_by_id("city_signup").send_keys("Dhaka")
driver.find_element_by_id("price_signup").send_keys("2500")
driver.find_element_by_id("address_signup").send_keys("Ring Road")

driver.find_element_by_id("submit_signup").click()