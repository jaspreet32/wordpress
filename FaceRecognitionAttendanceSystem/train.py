from tkinter import *
from tkinter import ttk
from PIL import Image, ImageTk
from tkinter import messagebox
import mysql.connector
import cv2
import os
import numpy as np
import random

class Train:
    def __init__(self, root):
        self.root = root
        self.root.maxsize(1300, 750)
        self.root.minsize(1300, 750)
        self.root.title("Face Recognition System")

        # Title - face recognition
        title_lbl = Label(text="PHOTO SAMPLE TRAINING",
                          font=("times new roman", 35, "bold"), bg="white", fg="dark green")
        title_lbl.place(x=0, y=0, width=1300, height=100)

        # # Image title
        # img = Image.open(r"images\title-photo-training.jpg")
        # img = img.resize((325, 100), Image.ANTIALIAS)
        # self.photoimg = ImageTk.PhotoImage(img)
        # bg_img = Label(title_lbl, image=self.photoimg)
        # bg_img.place(x=0, y=0, width=320, height=100)
        #
        # # Image title-1
        # img1 = Image.open(r"images\title-photo-training.jpg")
        # img1 = img1.resize((317, 100), Image.ANTIALIAS)
        # self.photoimg2 = ImageTk.PhotoImage(img1)
        # bg_img1 = Label(title_lbl, image=self.photoimg2)
        # bg_img1.place(x=970, y=0, width=317, height=100)
        #
        # # Main Frame
        # main_frame = Frame(self.root, bd=2, bg="white")
        # main_frame.place(x=0, y=100, width=1300, height=750)
        #
        # # LeftLabel Frame
        # Left_frame = LabelFrame(main_frame, bd=4, bg="white", relief=RIDGE, text="Train Data",
        #                         font=("times new roman", 12, "bold"))
        # Left_frame.place(x=5, y=12, width=630, height=588)
        #
        # # # Image On Left Frame 1
        # # img_left = Image.open(r"images\train-photo-left-frame.jpg")
        # # img_left = img_left.resize((613, 180), Image.ANTIALIAS)
        # # self.photoimg_left = ImageTk.PhotoImage(img_left)
        #
        # # f_lbl = Label(Left_frame, image=self.photoimg_left)
        # # f_lbl.place(x=5, y=0, width=613, height=180)
        #
        #
        #
        #
        # # Image On Left Frame 2
        # img_left_1 = Image.open(r"images\train-photo-1-left-frame.jpg")
        # img_left_1 = img_left_1.resize((613, 180), Image.ANTIALIAS)
        # self.photoimg_left_1 = ImageTk.PhotoImage(img_left_1)
        #
        # f_lbl_1 = Label(Left_frame, image=self.photoimg_left_1)
        # f_lbl_1.place(x=5, y=375, width=613, height=180)

        # Button for train data
        take_photo_btn = Button(self.root, text="TRAIN DATA", width=229, command=self.train_classifier,
                                font=("times new roman", 18, "bold"), bd=10, border=12,
                                bg="blue", fg="white")
        take_photo_btn.place(x=7, y=240, width=605, height=65)


        # Image on right
        # img1 = Image.open(r"images\photo-training.jpg")
        # img1 = img1.resize((640, 580), Image.ANTIALIAS)
        # self.photoimg1 = ImageTk.PhotoImage(img1)
        #
        # bg_img = Label(main_frame, image=self.photoimg1)
        # bg_img.place(x=650, y=19, width=640, height=580)

    def train_classifier(self):
        data_dir = ("data")
        path = [os.path.join(data_dir, file) for file in os.listdir(data_dir)]

        faces = []
        ids = []
        for image in path:
            img = Image.open(image).convert('L')
            imageNp = np.array(img, 'uint8')
            id = int(os.path.split(image)[1].split('.')[1])
            faces.append(imageNp)
            ids.append(id)
            cv2.imshow("Training", imageNp)
            cv2.waitKey(1) == 13
        ids = np.array(ids)

        # ------------------------- Train the classifier and save------------------------
        clf = cv2.face.LBPHFaceRecognizer_create()
        clf.train(faces, ids)
        clf.write("classifier.xml")
        cv2.destroyAllWindows()
        messagebox.showinfo("Result", "Training Dataset is Completed!")






if __name__ == "__main__":
    root = Tk()
    obj = Train(root)
    root.mainloop()
