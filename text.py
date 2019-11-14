import os, io
from google.cloud import vision
from google.cloud.vision import types
import pandas as pd
import pymysql

os.environ['GOOGLE_APPLICATION_CREDENTIALS'] = r'/Users/Connor/Downloads/iHealthy-key.json'

client = vision.ImageAnnotatorClient()

db = pymysql.connect("ihealthy.16mb.com", "u207738006_root", "123456", "u207738006_ihealthy")

cursor = db.cursor()


def detectText(img):
	with io.open(img, 'rb') as image_file:
		content = image_file.read()

	image = vision.types.Image(content=content)

	response = client.text_detection(image=image)
	texts = response.text_annotations

	df = pd.DataFrame(columns=['locale', 'description'])

	for text in texts:
		df = df.append(
			dict(
				Locale =text.locale,
				description=text.description
			),
			ignore_index=True
		)
	
	List = df['description'].tolist()
	A = []
	i = 1
	while i < len(List):
		if len(List[i]) >= 5:
			A.append(List[i])


		i+=1

	t = tuple(A)
	print(t)
	for i in t:
		row = cursor.execute("select * FROM `medicine` where medicine_name='%s'"%i)
		if row != 0:
			break
	
		
	print(i)
	db.close()
	return i


FILE_NAME = 'Xanax.jpeg'
FOLDER_PATH = r'/Users/Connor/Downloads/'
detectText(os.path.join(FOLDER_PATH, FILE_NAME))
