from tkinter import *
from tkinter import ttk
from PIL import Image, ImageTk
from student import Student
from train import Train
from face_recoginition import face_recognition
import os

class Face_Recognition_System:
    def __init__(self, root):
        self.root = root
        self.root.maxsize(1300, 750)
        self.root.minsize(1300, 750)
        self.root.title("Face Recognition System")

        # First Image
        img = Image.open(r"images\BestFacialRecognitionSoftware.jpg")
        img = img.resize((435, 130), Image.ANTIALIAS)
        self.photoimg = ImageTk.PhotoImage(img)

        f_lbl = Label(self.root, image=self.photoimg)
        f_lbl.place(x=0, y=0, width=435, height=130)

        # Second Image
        img1 = Image.open(r"images\Facial-Recognition-Software-Centre.png")
        img1 = img1.resize((435, 130), Image.ANTIALIAS)
        self.photoimg1 = ImageTk.PhotoImage(img1)

        f_lbl = Label(self.root, image=self.photoimg1)
        f_lbl.place(x=435, y=0, width=435, height=130)

        # Third Image
        img2 = Image.open(r"images\Face-Recognition-Software-Last.jpg")
        img2 = img2.resize((435, 130), Image.ANTIALIAS)
        self.photoimg2 = ImageTk.PhotoImage(img2)

        f_lbl = Label(self.root, image=self.photoimg2)
        f_lbl.place(x=870, y=0, width=435, height=130)

        # Background Image
        img3 = Image.open(r"images\front-background.jpg")
        img3 = img3.resize((1530, 790), Image.ANTIALIAS)
        self.photoimg3 = ImageTk.PhotoImage(img3)

        bg_img = Label(self.root, image=self.photoimg3)
        bg_img.place(x=0, y=130, width=1530, height=790)

        # Title - face recognition
        title_lbl = Label(bg_img, text="FACE RECOGNITION ATTENDANCE SYSTEM SOFTWARE", font=("times new roman", 35, "bold"), bg="white", fg="dark green")
        title_lbl.place(x=0, y=0, width=1300, height=45)

        # Student Details Button
        img4 = Image.open(r"images\student-details.jpg")
        img4 = img4.resize((220, 220), Image.ANTIALIAS)
        self.photoimg4 = ImageTk.PhotoImage(img4)

        b1 = Button(bg_img, command=self.student_details, image=self.photoimg4, cursor="hand2")
        b1.place(x=90, y=70, width=220, height=220)

        # Text - Student Details Button
        b1_1 = Button(bg_img, command=self.student_details, text="Student Details", font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b1_1.place(x=90, y=280, width=220, height=40)

        # Face Recognition Button
        img5 = Image.open(r"images\facial_recognition-button.png")
        img5 = img5.resize((220, 220), Image.ANTIALIAS)
        self.photoimg5 = ImageTk.PhotoImage(img5)

        b2 = Button(bg_img, image=self.photoimg5, cursor="hand2",command=self.face_data)
        b2.place(x=390, y=70, width=220, height=220)

        # Text - Face Recognition Button
        b2_2 = Button(bg_img, text="Face Recognition",cursor="hand2",command=self.face_data,font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b2_2.place(x=390, y=280, width=220, height=40)

        # Attendance Button
        img6 = Image.open(r"images\attendance-button.jpg")
        img6 = img6.resize((220, 220), Image.ANTIALIAS)
        self.photoimg6 = ImageTk.PhotoImage(img6)

        b3 = Button(bg_img, image=self.photoimg6, cursor="hand2")
        b3.place(x=690, y=70, width=220, height=220)

        # Text - Attendance Button
        b3_3 = Button(bg_img, text="Attendance", font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b3_3.place(x=690, y=280, width=220, height=40)

        # Help Desk Button
        img7 = Image.open(r"images\help-desk-button.jpg")
        img7 = img7.resize((220, 220), Image.ANTIALIAS)
        self.photoimg7 = ImageTk.PhotoImage(img7)

        b4 = Button(bg_img, image=self.photoimg7, cursor="hand2")
        b4.place(x=990, y=70, width=220, height=220)

        # Text - Help Desk Button
        b4_4 = Button(bg_img, text="Help", font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b4_4.place(x=990, y=280, width=220, height=40)

        # Train Data Button
        img8 = Image.open(r"images\train-data-button.png")
        img8 = img8.resize((220, 220), Image.ANTIALIAS)
        self.photoimg8 = ImageTk.PhotoImage(img8)

        b5 = Button(bg_img, image=self.photoimg8, cursor="hand2", command=self.train_data)
        b5.place(x=90, y=340, width=220, height=220)

        # Text - Train Data Button
        b5_5 = Button(bg_img, text="Train Data", command=self.train_data, font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b5_5.place(x=90, y=540, width=220, height=40)

        # Photos Show Button
        img9 = Image.open(r"images\photos-show-button.png")
        img9 = img9.resize((220, 220), Image.ANTIALIAS)
        self.photoimg9 = ImageTk.PhotoImage(img9)

        b6 = Button(bg_img, image=self.photoimg9, cursor="hand2", command=self.open_image)
        b6.place(x=390, y=340, width=220, height=220)

        # Text - Photos Show Button
        b6_6 = Button(bg_img, text="Photos", font=("times new roman", 15, "bold"), bg="dark blue", fg="white", command=self.open_image)
        b6_6.place(x=390, y=540, width=220, height=40)

        # Developer Button
        img10 = Image.open(r"images\developer-button.jpg")
        img10 = img10.resize((220, 220), Image.ANTIALIAS)
        self.photoimg10 = ImageTk.PhotoImage(img10)

        b7 = Button(bg_img, image=self.photoimg10, cursor="hand2")
        b7.place(x=690, y=340, width=220, height=220)

        # Text - Developer Button
        b7_7 = Button(bg_img, text="Developer", font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b7_7.place(x=690, y=540, width=220, height=40)

        # Exit
        img11 = Image.open(r"images\exit-button.jpg")
        img11 = img11.resize((220, 220), Image.ANTIALIAS)
        self.photoimg11 = ImageTk.PhotoImage(img11)

        b8 = Button(bg_img, image=self.photoimg11, cursor="hand2")
        b8.place(x=990, y=340, width=220, height=220)

        # Text - Help Desk Button
        b8_8 = Button(bg_img, text="Exit", font=("times new roman", 15, "bold"), bg="dark blue", fg="white")
        b8_8.place(x=990, y=540, width=220, height=40)

    def student_details(self):
        self.new_window = Toplevel(self.root)
        self.app = Student(self.new_window)

    def open_image(self):
        os.startfile("data")

    def train_data(self):
        self.new_window = Toplevel(self.root)
        self.app1 = Train(self.new_window)

    def face_data(self):
        self.new_window = Toplevel(self.root)
        self.app1 = face_recognition(self.new_window)


if __name__ == "__main__":
    root = Tk()
    obj = Face_Recognition_System(root)
    root.mainloop()
