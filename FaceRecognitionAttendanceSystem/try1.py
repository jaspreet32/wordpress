from tkinter import *
from tkinter import ttk
from PIL import Image, ImageTk
from tkinter import messagebox
import mysql.connector
from time import strftime
from datetime import *
import time
import cv2
import os
import numpy as np
import random

class face_recognition:
    def __init__(self, root):
        self.root = root
        self.root.maxsize(1300, 750)
        self.root.minsize(1300, 750)
        self.root.title("Face Recognition System")




        img3 = Image.open(r"images\detectionframe.png")
        img3 = img3.resize((1300, 750), Image.ANTIALIAS)
        self.photoimg3 = ImageTk.PhotoImage(img3)

        bg_img = Label(self.root, image=self.photoimg3)
        bg_img.place(x=0, y=0, width=1300, height=750)

        # img = Image.open(r"images\facial-recognition.png")
        # img = img.resize((100, 70), Image.ANTIALIAS)
        # self.photoimg = ImageTk.PhotoImage(img)
        #
        # icon_img = Label(self.root, image=self.photoimg,bg="white")
        # icon_img.place(x=414, y=28, width=100, height=70)

    # Title - face recognition
        self.txt = "Face Recognition System"
        self.count = 0
        self.text = ''
        self.color = ["#4f4e4d", "#f29844", "red2"]
        self.heading = Label(bg_img, text=self.txt, font=('yu gothic ui', 30, "bold"), bg="white",
                             fg='black',
                             bd=5,
                             relief=FLAT)
        self.heading.place(x=480, y=20, width=350)
        self.slider()
        self.heading_color()
        # Main Frame
        main_frame = Frame(self.root, bd=2, background="white")
        main_frame.place(x=100, y=37, width=300, height=690)

        # =================================== Time =========================================
        self.clock_image = ImageTk.PhotoImage(file="images/time.png")
        self.date_time_image = Label(main_frame, image=self.clock_image, bg="white", activebackground="white")
        self.date_time_image.place(x=0, y=7)

        self.date_time = Label(self.root)
        self.date_time.place(x=75, y=40)
        self.time_running()

        # self.dat = Label(self.root, text='Date : ', bg='#fff', fg='black', font=('Arial', 10, 'bold'))
        # self.dat.place(x=709, y=131)
        # self.dat2 = Label(root, text=self.today, bg='#fff', fg='black', font=('Arial', 10, 'bold'))
        # self.dat2.place(x=790, y=131)
        # take_photo_btn = Button(bg_img, text="TRAIN DATA", width=229, command=self.face_recog,
        #                         font=("times new roman", 18, "bold"), bd=10, border=12,
        #                         bg="blue", fg="white")
        # take_photo_btn.place(x=570, y=240, width=205, height=65)
        # img_left = img_left.resize((608, 130), Image.ANTIALIAS)
        # self.photoimg_right = ImageTk.PhotoImage(img_right)
        # # #
        # f_lbl = Label(attendance_frame, image=self.photoimg_right)
        # f_lbl.place(x=3, y=2, width=297, height=150)
        attendance_frame = LabelFrame(self.root, bd=4, bg="white", relief=RIDGE, text="Attendance",
                                          font=("times new roman", 12, "bold"))
        attendance_frame .place(x=550, y=150, width=308, height=450)
        # img
        # img_right = Image.open(r"images\current_course.jpg")
        # img_right = img_right.resize((608, 130), Image.ANTIALIAS)
        # self.photoimg_right = ImageTk.PhotoImage(img_right)
        # #
        # f_lbl = Label(attendance_frame, image=self.photoimg_right)
        # f_lbl.place(x=3, y=2, width=297, height=150)
        # buttons
        attendance_checkin_btn = Button(attendance_frame, text="CHECK IN", width=150, command=self.face_recog,
                                        font=("Arial", 15, "bold"), bd=10, border=12,
                                        bg="crimson", fg="white")
        attendance_checkin_btn.place(x=70, y=200, width=150, height=55)
        attendance_checkout_btn = Button(attendance_frame, text="CHECK OUT", width=150,
                                         font=("Arial", 15, "bold"), bd=10, border=12,
                                         bg="crimson", fg="white")
        attendance_checkout_btn.place(x=70, y=300, width=150, height=55)


    def slider(self):
        """creates slides for heading by taking the text,
        and that text are called after every 100 ms"""
        if self.count >= len(self.txt):
            self.count = -1
            self.text = ''
            self.heading.config(text=self.text)

        else:
            self.text = self.text + self.txt[self.count]
            self.heading.config(text=self.text)
        self.count += 1

        self.heading.after(200, self.slider)

    def heading_color(self):
        """
        configures heading label
        :return: every 50 ms returned new random color.

        """
        fg = random.choice(self.color)
        self.heading.config(fg=fg)
        self.heading.after(50, self.heading_color)


    ###################################attendance#############################################





        # ==============================face recognition===================================

    def face_recog(self):
        def draw_boundary(img,classifier,scaleFactor,minNeighbors,color,text,clf):
            gray_image=cv2.cvtColor(img,cv2.COLOR_BGRA2GRAY)
            features=classifier.detectMultiScale(gray_image,scaleFactor,minNeighbors)

            coord=[]

            for(x,y,w,h) in features:
                cv2.rectangle(img,(x,y),(x+w,y+h),(0,255,0),3)
                id,predict=clf.predict(gray_image[y:y+h,x:x+w])
                confidence=int((100*(1-predict/300)))

                conn = mysql.connector.connect(host="localhost", username="root", password="",
                                               database="face_recognition")
                my_cursor = conn.cursor()

                my_cursor.execute("select student_name from student where student_id="+str(id))
                recognised_student_name=my_cursor.fetchone()
                recognised_student_name="+".join(recognised_student_name)

                my_cursor.execute("select roll_no from student where student_id=" + str(id))
                recognised_student_roll = my_cursor.fetchone()
                recognised_student_roll = "+".join(recognised_student_roll)

                my_cursor.execute("select department from student where student_id=" + str(id))
                recognised_student_dep = my_cursor.fetchone()
                recognised_student_dep = "+".join(recognised_student_dep)




                if confidence>77:
                    cv2.putText(img,f"Roll:{recognised_student_roll}",(x,y-55),cv2.FONT_HERSHEY_COMPLEX,0.8,(255,255,255),3)
                    cv2.putText(img, f"Roll:{recognised_student_name}", (x, y - 30), cv2.FONT_HERSHEY_COMPLEX,0.8,(255,255,255),3)
                    cv2.putText(img, f"Roll:{recognised_student_dep}", (x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.8,(255,255,255),3)
                    self.mark_attendance(recognised_student_roll,recognised_student_name,recognised_student_dep)

                else:
                    cv2.rectangle(img(x, y), (x + w, y + h), (0, 0, 255), 3)
                    cv2.putText(img,"Unknown Face" (x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)

                coord=[x,y,w,h]

            return coord

        def recognize(img,clf,faceCascade):
            coord=draw_boundary(img,faceCascade,1.1,10,(255,255,255),"FACE",clf)
            return img




        faceCascade=cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
        clf= cv2.face.LBPHFaceRecognizer_create()
        clf.read("classifier.xml")


        video_cap=cv2.VideoCapture(0)


        while  TRUE:
            ret,img=video_cap.read()
            img=recognize(img,clf,faceCascade)
            cv2.imshow("welcome to face recognition",img)

            if cv2.waitKey(1)==13:
                break
                video_cap.release()
                cv2.destroyAllWindows()
    def time_running(self):
        """ displays the current date and time which is shown at top left corner of admin dashboard"""
        self.time = time.strftime("%H:%M:%S")
        self.date = time.strftime('%Y/%m/%d')
        concated_text = f"  {self.time} \n {self.date}"
        self.date_time.configure(text=concated_text, font=("yu gothic ui", 13, "bold"), relief=FLAT, borderwidth=0,
                                 background="white", foreground="black")
        self.date_time.after(100, self.time_running)

root = Tk()
obj = face_recognition(root)
root.mainloop()