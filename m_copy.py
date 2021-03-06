import face_recognition
import sys
import os
import cv2


unknown_image=face_recognition.load_image_file(sys.argv[2])
img=cv2.imread(sys.argv[2])
#cv2.imshow('ImagedWindow',img)
face_locations=face_recognition.face_locations(unknown_image)
unknown_encoding=face_recognition.face_encodings(unknown_image)[0]
face_names=[]

if (len(unknown_encoding) > 0):
	#known_encodings=[]
	#results=[]
	recognized = -1
	for root,dirs,filenames in os.walk(sys.argv[1]):
		for f in filenames:
			#face_names=[]
			known_image=face_recognition.load_image_file(sys.argv[1]+f)
			face_location=face_recognition.face_locations(known_image)
			known_encoding=face_recognition.face_encodings(known_image)[0]
			#known_encodings.append(known_encoding)
			results=face_recognition.compare_faces([known_encoding],unknown_encoding)
			if results[0] == True:
				name=os.path.splitext(f)[0]
				face_names.append(name)
				print(name)
				recognized = 1

	if recognized == -1:
		print("Unknown")
	
else:
	name="There is no person in the picture"


print(face_names)
quit()
# Display the results
for (top, right, bottom, left), name in zip(face_locations, face_names):
	# Draw a box around the face
	cv2.rectangle(img, (left, top), (right, bottom), (0, 0, 255), 2)

        # Draw a label with a name below the face
        cv2.rectangle(img, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
        font = cv2.FONT_HERSHEY_DUPLEX
        cv2.putText(img, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)

    # Display the resulting image
cv2.imwrite('img2.jpg', img)
