# from tkinter import *
# import tkinter as tk
# from tkinter import ttk
# from PIL import Image, ImageTk
# from student import Student
# from train import Train
# from face_recognition import face_recognition
# import os
# from datetime import *
# import time
# import numpy as np
# import random
#
#
#
# class Face_Recognition_System:
#     def __init__(self, root):
#         self.root = root
#         self.root.maxsize(1300, 750)
#         self.root.minsize(1300, 750)
#         self.root.title("Face Recognition System")
#
#         # Background Image
#         img3 = Image.open(r"images\frame.png")
#         img3 = img3.resize((1300, 737), Image.ANTIALIAS)
#         self.photoimg3 = ImageTk.PhotoImage(img3)
#
#         bg_img = Label(self.root, image=self.photoimg3)
#         bg_img.place(x=0, y=0, width=1300, height=737)
#
#         # Main Frame
#         main_frame = Frame(self.root, bd=2, background="white")
#         main_frame.place(x=40, y=37, width=1219, height=660)
#
#         # =================================== Time =========================================
#         self.clock_image = ImageTk.PhotoImage(file="images/time.png")
#         self.date_time_image = Label(main_frame, image=self.clock_image, bg="white", activebackground="white")
#         self.date_time_image.place(x=0, y=7)
#
#         self.date_time = Label(self.root)
#         self.date_time.place(x=75, y=40)
#         self.time_running()
#
#         # ========================== Heading =====================================
#         self.txt = "Welcome to Face Recognition Attendance System"
#         self.count = 0
#         self.text = ''
#         self.color = ["#4f4e4d", "#f29844", "red2"]
#         self.heading = Label(main_frame, text=self.txt, font=('yu gothic ui', 20, "bold"), bg="white",
#                              fg='black',
#                              bd=5,
#                              relief=FLAT)
#         self.heading.place(x=250, y=2, width=650)
#         self.slider()
#         self.heading_color()
#
#         # ============================Current user================================
#         self.current_user_image = ImageTk.PhotoImage(file="images/current_user.png")
#         self.current_user_label = Label(main_frame, image=self.current_user_image, bg="white")
#         self.current_user_label.place(x=920, y=3)
#
#         # self.current_user = Label(main_frame, bg="white",
#         #                           font=("yu gothic ui", 10, "bold"), fg="green")
#         # self.current_user.place(x=1000, y=48)
#
#         # ============================Logout button===============================
#         self.logout = ImageTk.PhotoImage(file="images\logout.png")
#         self.logout_button = Button(main_frame, image=self.logout,
#                                     font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                     , borderwidth=0, background="white", cursor="hand2")
#         self.logout_button.place(x=1130, y=3)
#
#         # ============================ Line ================================
#         line = Image.open(r"images\line.png")
#         line = line.resize((1220, 10), Image.ANTIALIAS)
#         self.line = ImageTk.PhotoImage(line)
#
#         bg_img = Label(main_frame, image=self.line, bg="white")
#         bg_img.place(x=0, y=50, width=1220, height=10)
#
#         # ============================Home Frame====================================
#         home_frame = Frame(main_frame)
#         home_frame.place(x=0, y=70, height=117, width=115)
#
#         # ============================Home button====================================
#         self.home = ImageTk.PhotoImage(file='images/home.png')
#         self.home_button = Button(home_frame, image=self.home,
#                                   font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                   , borderwidth=0, background="white", cursor="hand2")
#         self.home_button.place(x=0, y=0)
#
#         # ============================View Frame====================================
#         view_frame = Frame(main_frame)
#         view_frame.place(x=0, y=280, height=120, width=117)
#
#         # ============================View button====================================
#         self.view = ImageTk.PhotoImage(file='images/view.png')
#         self.view_button = Button(view_frame, image=self.view,
#                                   font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                   , borderwidth=0, background="white", cursor="hand2")
#         self.view_button.place(x=0, y=0)
#
#         # ============================ Exit Frame====================================
#         exit_frame = Frame(main_frame)
#         exit_frame.place(x=0, y=500, height=120, width=125)
#
#         # ============================ Exit button====================================
#         self.exit = ImageTk.PhotoImage(file='images/exit.png')
#         self.exit_button = Button(exit_frame, image=self.exit,
#                                   font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                   , borderwidth=0, background="white", cursor="hand2")
#
#         self.exit_button.place(x=0, y=0)
#
#         # =========================== Manage Frame ===========================================
#         manage_frame = Image.open(r"images\manage frame.png")
#         manage_frame = manage_frame.resize((1104, 597), Image.ANTIALIAS)
#         self.manage_frame = ImageTk.PhotoImage(manage_frame)
#
#         manage_frame = Label(main_frame, image=self.manage_frame, bg="white")
#         manage_frame.place(x=120, y=58, width=1104, height=597)
#
#         # =================== Student Details =======================
#         self.student = ImageTk.PhotoImage(file='images/student-details.png')
#         self.student_button = Button(manage_frame, image=self.student, command=self.student_details,
#                                   font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                   , borderwidth=0, background="white", cursor="hand2")
#
#         self.student_button.place(x=139, y=163, width=136, height=123)
#
#         # =================== Face Recognition =======================
#         self.face_recognition = ImageTk.PhotoImage(file='images/face-recognition.png')
#         self.face_recognition_button = Button(manage_frame, image=self.face_recognition, command=self.facerecognition,
#                                      font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                      , borderwidth=0, background="white", cursor="hand2")
#
#         self.face_recognition_button.place(x=473, y=163, width=136, height=123)
#
#         # =================== Attendance =======================
#         self.attendance = ImageTk.PhotoImage(file='images/attendance.png')
#         self.attendance_button = Button(manage_frame, image=self.attendance,
#                                               font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                               , borderwidth=0, background="white", cursor="hand2")
#
#         self.attendance_button.place(x=809, y=163, width=136, height=123)
#
#         # =================== Train Data =======================
#         self.train_data = ImageTk.PhotoImage(file='images/train_data.png')
#         self.train_data_button = Button(manage_frame, image=self.train_data, command=self.traindata,
#                                         font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                         , borderwidth=0, background="white", cursor="hand2")
#
#         self.train_data_button.place(x=140, y=415, width=134, height=123)
#
#         # =================== Photos =======================
#         self.photos = ImageTk.PhotoImage(file='images/photos.png')
#         self.photos_button = Button(manage_frame, image=self.photos, command=self.open_image,
#                                         font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                         , borderwidth=0, background="white", cursor="hand2")
#
#         self.photos_button.place(x=475, y=412, width=134, height=126)
#
#         # =================== Help Desk =======================
#         self.help_desk = ImageTk.PhotoImage(file='images/help_desk.png')
#         self.help_desk_button = Button(manage_frame, image=self.help_desk,
#                                         font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
#                                         , borderwidth=0, background="white", cursor="hand2")
#
#         self.help_desk_button.place(x=809, y=415, width=134, height=123)
#
#
#
#     def time_running(self):
#         """ displays the current date and time which is shown at top left corner of admin dashboard"""
#         self.time = time.strftime("%H:%M:%S")
#         self.date = time.strftime('%Y/%m/%d')
#         concated_text = f"  {self.time} \n {self.date}"
#         self.date_time.configure(text=concated_text, font=("yu gothic ui", 13, "bold"), relief=FLAT, borderwidth=0,
#                                  background="white", foreground="black")
#         self.date_time.after(100, self.time_running)
#
#     def slider(self):
#         """creates slides for heading by taking the text,
#         and that text are called after every 150 ms"""
#         if self.count >= len(self.txt):
#             self.count = -1
#             self.text = ''
#             self.heading.config(text=self.text)
#
#         else:
#             self.text = self.text + self.txt[self.count]
#             self.heading.config(text=self.text)
#         self.count += 1
#
#         self.heading.after(150, self.slider)
#
#     def heading_color(self):
#         """
#         configures heading label
#         :return: every 50 ms returned new random color.
#
#         """
#         fg = random.choice(self.color)
#         self.heading.config(fg=fg)
#         self.heading.after(50, self.heading_color)
#
#
#     def student_details(self):
#         self.new_window = Toplevel(self.root)
#         self.app = Student(self.new_window)
#
#     def open_image(self):
#         os.startfile("data")
#
#     def traindata(self):
#         self.new_window = Toplevel(self.root)
#         self.app1 = Train(self.new_window)
#
#     def facerecognition(self):
#         self.new_window = Toplevel(self.root)
#         self.app2 =face_recognition(self.new_window)
#
#
# if __name__ == "__main__":
#     root = Tk()
#     obj = Face_Recognition_System(root)
#     root.mainloop()

import tkinter as tk
from tkinter import font as tkfont
from tkinter import *
from PIL import Image, ImageTk
from student import Student
from train import Train
import os
from datetime import *
from datetime import datetime
import time
import numpy as np
import random
import cv2
import mysql.connector
from tkinter import messagebox
from time import strftime

class Face_Recognition_System(tk.Tk):
    def __init__(self, *args, **kwargs):
        tk.Tk.__init__(self, *args, **kwargs)
        self.maxsize(1300, 750)
        self.minsize(1300, 750)
        self.title_font = tkfont.Font(family='Helvetica', size=18, weight="bold", slant="italic")

        # the container is where we'll stack a bunch of frames
        # on top of each other, then the one we want visible
        # will be raised above the others
        container = tk.Frame(self)
        container.pack(side="top", fill="both", expand=True)
        container.grid_rowconfigure(0, weight=1)
        container.grid_columnconfigure(0, weight=1)

        self.frames = {}
        for F in (StartPage, faceRecognition, PageTwo):
            page_name = F.__name__
            frame = F(parent=container, controller=self)
            self.frames[page_name] = frame

            # put all of the pages in the same location;
            # the one on the top of the stacking order
            # will be the one that is visible.
            frame.grid(row=0, column=0, sticky="nsew")

        self.show_frame("StartPage")

    def show_frame(self, page_name):
        """ Show a frame for the given page name """
        frame = self.frames[page_name]
        frame.tkraise()


class StartPage(tk.Frame, self.recognised_student_dep):
    def __init__(self, parent, controller):
        tk.Frame.__init__(self, parent)
        self.controller = controller
        # Background Image
        img3 = Image.open(r"images\frame.png")
        img3 = img3.resize((1300, 737), Image.ANTIALIAS)
        self.photoimg3 = ImageTk.PhotoImage(img3)

        bg_img = Label(self, image=self.photoimg3)
        bg_img.place(x=0, y=0, width=1300, height=737)

        # Main Frame
        main_frame = Frame(self, bd=2, background="white")
        main_frame.place(x=40, y=37, width=1219, height=660)

        # =================================== Time =========================================
        self.clock_image = ImageTk.PhotoImage(file="images/time.png")
        self.date_time_image = Label(main_frame, image=self.clock_image, bg="white", activebackground="white")
        self.date_time_image.place(x=0, y=7)

        self.date_time = Label(self)
        self.date_time.place(x=75, y=40)
        self.time_running()

        # ========================== Heading =====================================
        self.txt = "Welcome to Face Recognition Attendance System"
        self.count = 0
        self.text = ''
        self.color = ["#4f4e4d", "#f29844", "red2"]
        self.heading = Label(main_frame, text=self.txt, font=('yu gothic ui', 20, "bold"), bg="white",
                             fg='black',
                             bd=5,
                             relief=FLAT)
        self.heading.place(x=250, y=2, width=650)
        self.slider()
        self.heading_color()

        # ============================Current user================================
        self.current_user_image = ImageTk.PhotoImage(file="images/current_user.png")
        self.current_user_label = Label(main_frame, image=self.current_user_image, bg="white")
        self.current_user_label.place(x=920, y=3)

        # self.current_user = Label(main_frame, bg="white",
        #                           font=("yu gothic ui", 10, "bold"), fg="green")
        # self.current_user.place(x=1000, y=48)

        # ============================Logout button===============================
        self.logout = ImageTk.PhotoImage(file="images\logout.png")
        self.logout_button = Button(main_frame, image=self.logout,
                                    font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                    , borderwidth=0, background="white", cursor="hand2")
        self.logout_button.place(x=1130, y=3)

        # ============================ Line ================================
        line = Image.open(r"images\line.png")
        line = line.resize((1220, 10), Image.ANTIALIAS)
        self.line = ImageTk.PhotoImage(line)

        bg_img = Label(main_frame, image=self.line, bg="white")
        bg_img.place(x=0, y=50, width=1220, height=10)

        # ============================Home Frame====================================
        home_frame = Frame(main_frame)
        home_frame.place(x=0, y=70, height=117, width=115)

        # ============================Home button====================================
        self.home = ImageTk.PhotoImage(file='images/home.png')
        self.home_button = Button(home_frame, image=self.home,
                                  font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                  command=lambda: controller.show_frame("StartPage")
                                  , borderwidth=0, background="white", cursor="hand2")
        self.home_button.place(x=0, y=0)

        # ============================View Frame====================================
        view_frame = Frame(main_frame)
        view_frame.place(x=0, y=280, height=120, width=117)

        # ============================View button====================================
        self.view = ImageTk.PhotoImage(file='images/view.png')
        self.view_button = Button(view_frame, image=self.view,
                                  font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                  , borderwidth=0, background="white", cursor="hand2")
        self.view_button.place(x=0, y=0)

        # ============================ Exit Frame====================================
        exit_frame = Frame(main_frame)
        exit_frame.place(x=0, y=500, height=120, width=125)

        # ============================ Exit button====================================
        self.exit = ImageTk.PhotoImage(file='images/exit.png')
        self.exit_button = Button(exit_frame, image=self.exit,
                                  font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                  , borderwidth=0, background="white", cursor="hand2")

        self.exit_button.place(x=0, y=0)

        # =========================== Manage Frame ===========================================
        manage_frame = Image.open(r"images\manage frame.png")
        manage_frame = manage_frame.resize((1104, 597), Image.ANTIALIAS)
        self.manage_frame = ImageTk.PhotoImage(manage_frame)

        manage_frame = Label(main_frame, image=self.manage_frame, bg="white")
        manage_frame.place(x=120, y=58, width=1104, height=597)

        # =================== Student Details =======================
        self.student = ImageTk.PhotoImage(file='images/student-details.png')
        self.student_button = Button(manage_frame, image=self.student, command=self.student_details,
                                     font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                     , borderwidth=0, background="white", cursor="hand2")

        self.student_button.place(x=139, y=163, width=136, height=123)

        # =================== Face Recognition =======================
        self.face_recognition = ImageTk.PhotoImage(file='images/face-recognition.png')
        self.face_recognition_button = Button(manage_frame, image=self.face_recognition,
                                              command=lambda: controller.show_frame("faceRecognition"),
                                              font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                              , borderwidth=0, background="white", cursor="hand2")

        self.face_recognition_button.place(x=473, y=163, width=136, height=123)

        # =================== Attendance =======================
        self.attendance = ImageTk.PhotoImage(file='images/attendance.png')
        self.attendance_button = Button(manage_frame, image=self.attendance,
                                        font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                        borderwidth=0, background="white", cursor="hand2")

        self.attendance_button.place(x=809, y=163, width=136, height=123)

        # =================== Train Data =======================
        self.train_data = ImageTk.PhotoImage(file='images/train_data.png')
        self.train_data_button = Button(manage_frame, image=self.train_data, command=self.traindata,
                                        font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                        , borderwidth=0, background="white", cursor="hand2")

        self.train_data_button.place(x=140, y=415, width=134, height=123)

        # =================== Photos =======================
        self.photos = ImageTk.PhotoImage(file='images/photos.png')
        self.photos_button = Button(manage_frame, image=self.photos, command=self.open_image,
                                    font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                    , borderwidth=0, background="white", cursor="hand2")

        self.photos_button.place(x=475, y=412, width=134, height=126)

        # =================== Help Desk =======================
        self.help_desk = ImageTk.PhotoImage(file='images/help_desk.png')
        self.help_desk_button = Button(manage_frame, image=self.help_desk,
                                       font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                       command=lambda: controller.show_frame("PageTwo")
                                       , borderwidth=0, background="white", cursor="hand2")

        self.help_desk_button.place(x=809, y=415, width=134, height=123)

    def time_running(self):
        """ displays the current date and time which is shown at top left corner of admin dashboard"""
        self.time = time.strftime("%H:%M:%S")
        self.date = time.strftime('%Y/%m/%d')
        concated_text = f"  {self.time} \n {self.date}"
        self.date_time.configure(text=concated_text, font=("yu gothic ui", 13, "bold"), relief=FLAT, borderwidth=0,
                                 background="white", foreground="black")
        self.date_time.after(100, self.time_running)

    def slider(self):
        """creates slides for heading by taking the text,
        and that text are called after every 150 ms"""
        if self.count >= len(self.txt):
            self.count = -1
            self.text = ''
            self.heading.config(text=self.text)

        else:
            self.text = self.text + self.txt[self.count]
            self.heading.config(text=self.text)
        self.count += 1

        self.heading.after(150, self.slider)

    def heading_color(self):
        """
        configures heading label
        :return: every 50 ms returned new random color.

        """
        fg = random.choice(self.color)
        self.heading.config(fg=fg)
        self.heading.after(50, self.heading_color)

    def student_details(self):
        self.new_window = Toplevel(self)
        self.app = Student(self.new_window)

    def open_image(self):
        os.startfile("data")

    def traindata(self):
        self.new_window = Toplevel(self)
        self.app1 = Train(self.new_window)
    #
    # def facerecognition(self):
    #     self.new_window = Toplevel(self)
    #     self.app2 = face_recognition(self.new_window)


class faceRecognition(tk.Frame):
    def __init__(self, parent, controller):
        tk.Frame.__init__(self, parent)
        self.controller = controller
        # Background Image
        img3 = Image.open(r"images\detectionframe.png")
        img3 = img3.resize((1300, 737), Image.ANTIALIAS)
        self.photoimg3 = ImageTk.PhotoImage(img3)

        bg_img = Label(self, image=self.photoimg3)
        bg_img.place(x=0, y=0, width=1300, height=737)

        # Main Frame
        main_frame = Frame(self, bd=2, background="white")
        main_frame.place(x=207, y=39, width=885, height=660)

        # =================================== Time =========================================
        self.clock_image = ImageTk.PhotoImage(file="images/time.png")
        self.date_time_image = Label(main_frame, image=self.clock_image, background="white", activebackground="white")
        self.date_time_image.place(x=0, y=7)

        self.date_time = Label(self)
        self.date_time.place(x=240, y=40)
        self.time_running()

        # ========================== Heading =====================================
        self.txt = "Attendance System"
        self.count = 0
        self.text = ''
        self.color = ["#4f4e4d", "#f29844", "red2"]
        self.heading = Label(main_frame, text=self.txt, font=('yu gothic ui', 20, "bold"), bg="white", fg='black', bd=5,
                             relief=FLAT)
        self.heading.place(x=140, y=2, width=600)
        self.slider()
        self.heading_color()

        # ============================Current user================================
        self.current_user_image = ImageTk.PhotoImage(file="images/current_user.png")
        self.current_user_label = Label(main_frame, image=self.current_user_image, bg="white")
        self.current_user_label.place(x=610, y=3)

        # self.current_user = Label(main_frame, bg="white",
        #                           font=("yu gothic ui", 10, "bold"), fg="green")
        # self.current_user.place(x=1000, y=48)

        # ============================Logout button===============================
        self.logout = ImageTk.PhotoImage(file="images\logout.png")
        self.logout_button = Button(main_frame, image=self.logout,
                                    font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                    , borderwidth=0, background="white", cursor="hand2")
        self.logout_button.place(x=800, y=3)

        # ============================ Line ================================
        line = Image.open(r"images\line.png")
        line = line.resize((1220, 10), Image.ANTIALIAS)
        self.line = ImageTk.PhotoImage(line)

        bg_img = Label(main_frame, image=self.line, bg="white")
        bg_img.place(x=7, y=50, width=867, height=10)

        # ============================Home Frame====================================
        home_frame = Frame(main_frame)
        home_frame.place(x=0, y=70, height=117, width=115)

        # ============================Home button====================================
        self.home = ImageTk.PhotoImage(file='images/home.png')
        self.home_button = Button(home_frame, image=self.home,
                                  font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                  command=lambda: controller.show_frame("StartPage")
                                  , borderwidth=0, background="white", cursor="hand2")
        self.home_button.place(x=0, y=0)

        # ============================View Frame====================================
        view_frame = Frame(main_frame)
        view_frame.place(x=0, y=280, height=120, width=117)

        # ============================View button====================================
        self.view = ImageTk.PhotoImage(file='images/view.png')
        self.view_button = Button(view_frame, image=self.view,
                                  font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                  command=lambda: controller.show_frame("PageTwo")
                                  , borderwidth=0, background="white", cursor="hand2")
        self.view_button.place(x=0, y=0)

        # ============================ Exit Frame====================================
        exit_frame = Frame(main_frame)
        exit_frame.place(x=0, y=500, height=120, width=125)

        # ============================ Exit button====================================
        self.exit = ImageTk.PhotoImage(file='images/exit.png')
        self.exit_button = Button(exit_frame, image=self.exit,
                                  font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white"
                                  , borderwidth=0, background="white", cursor="hand2")

        self.exit_button.place(x=0, y=0)

        # =========================== Manage Frame ===========================================
        manage_frame = Image.open(r"images\backround_attendance.png")
        manage_frame = manage_frame.resize((700, 520), Image.ANTIALIAS)
        self.manage_frame = ImageTk.PhotoImage(manage_frame)

        manage_frame = Label(main_frame, image=self.manage_frame, bg="white")
        manage_frame.place(x=150, y=90, width=700, height=530)

        # =================== Check In =======================
        self.check_in = ImageTk.PhotoImage(file='images/check_in.png')
        self.check_in_button = Button(manage_frame, image=self.check_in,
                                      font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                      command=self.face_recog
                                      , borderwidth=0, background="white", cursor="hand2", state=NORMAL)

        self.check_in_button.place(x=116, y=186, width=136, height=123)

        # =================== Check Out =======================
        self.check_out = ImageTk.PhotoImage(file='images/check_out.png')
        self.check_out_button = Button(manage_frame, image=self.check_out,
                                       font=("yu gothic ui", 13, "bold"), relief=FLAT, activebackground="white",
                                       command=self.face_recog_check_out,
                                       borderwidth=0, background="white", cursor="hand2")

        self.check_out_button.place(x=450, y=186, width=136, height=123)

    def time_running(self):
        """ displays the current date and time which is shown at top left corner of admin dashboard"""
        self.time = time.strftime("%H:%M:%S")
        self.date = time.strftime('%Y/%m/%d')
        concated_text = f"  {self.time} \n {self.date}"
        self.date_time.configure(text=concated_text, font=("yu gothic ui", 13, "bold"), relief=FLAT, borderwidth=0,
                                 background="white", foreground="black")
        self.date_time.after(100, self.time_running)

    def slider(self):
        """creates slides for heading by taking the text,
        and that text are called after every 150 ms"""
        if self.count >= len(self.txt):
            self.count = -1
            self.text = ''
            self.heading.config(text=self.text)

        else:
            self.text = self.text + self.txt[self.count]
            self.heading.config(text=self.text)
        self.count += 1

        self.heading.after(150, self.slider)

    def heading_color(self):
        """
        configures heading label
        :return: every 50 ms returned new random color.

        """
        fg = random.choice(self.color)
        self.heading.config(fg=fg)
        self.heading.after(50, self.heading_color)

    # ============================ Attendance for login =======================================
    def mark_attendance(self, recognised_student_roll, recognised_student_name, recognised_student_dep):
        conn = mysql.connector.connect(host="localhost", username="root", password="", database="face_recognition")
        my_cursor = conn.cursor()
        query = ("SELECT status  from attendence  WHERE name='%s' ORDER BY login_datetime  DESC LIMIT 1")
        my_cursor.execute(query % (recognised_student_name))
        recognised_student_status = my_cursor.fetchone()
        if (recognised_student_status != None):
            recognised_student_status_new = recognised_student_status[0]
        else:
            recognised_student_status_new = None

        conn.commit()
        conn.close()
        connection = mysql.connector.connect(host="localhost", username="root", password="",
                                             database="face_recognition")
        my_cursor = connection.cursor()

        my_cursor.execute("SELECT roll_no  from attendence")
        data = my_cursor.fetchall()
        name_list = [r for r in data]
        connection.commit()
        connection.close()

        if any((recognised_student_roll in i for i in name_list)):
            if ((recognised_student_status_new == "checkout")):
                connect = mysql.connector.connect(host="localhost", username="root", password="",
                                                  database="face_recognition")
                my_cursor = connect.cursor()

                timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
                query = "INSERT INTO attendence (id, name,roll_no,department,login_datetime,status)VALUES (%s,%s,%s,%s,%s,%s)"
                my_cursor.execute(query, (
                    "",
                    recognised_student_name,
                    recognised_student_roll,
                    recognised_student_dep,
                    timestamp, "checkin"
                ))
                connect.commit()
                connect.close()
        elif any(recognised_student_roll not in i for i in name_list):
            connect = mysql.connector.connect(host="localhost", username="root", password="",
                                              database="face_recognition")
            my_cursor = connect.cursor()
            timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            query = "INSERT INTO attendence (id, name,roll_no,department,login_datetime,status)VALUES (%s,%s,%s,%s,%s,%s)"
            my_cursor.execute(query, (
                "",
                recognised_student_name,
                recognised_student_roll,
                recognised_student_dep,
                timestamp, "checkin"
            ))
            connect.commit()
            connect.close()
        elif (name_list == []):
            connect = mysql.connector.connect(host="localhost", username="root", password="",
                                              database="face_recognition")
            my_cursor = connect.cursor()

            timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            query = "INSERT INTO attendence (id, name,roll_no,department,login_datetime,status)VALUES (%s,%s,%s,%s,%s,%s)"
            my_cursor.execute(query, (
                "",
                recognised_student_name,
                recognised_student_roll,
                recognised_student_dep,
                timestamp, "checkin"
            ))
            connect.commit()
            connect.close()
        else:
            print("cant checkin")

    # ================================= Attendance for checkout ================================
    def mark_attendance_check_out(self, recognised_student_roll, recognised_student_name, recognised_student_dep):
        conn = mysql.connector.connect(host="localhost", username="root", password="", database="face_recognition")
        my_cursor = conn.cursor()
        query = ("SELECT status  from attendence  WHERE name='%s' ORDER BY login_datetime  DESC LIMIT 1")
        my_cursor.execute(query % (recognised_student_name))
        recognised_student_status = my_cursor.fetchone()
        if (recognised_student_status != None):
            recognised_student_status_new = recognised_student_status[0]
        else:
            recognised_student_status_new = None

        conn.commit()
        conn.close()
        connection = mysql.connector.connect(host="localhost", username="root", password="",
                                             database="face_recognition")
        my_cursor = connection.cursor()

        my_cursor.execute("SELECT roll_no  from attendence")
        data = my_cursor.fetchall()
        name_list = [r for r in data]
        connection.commit()
        connection.close()

        if any((recognised_student_roll in i for i in name_list)):
            if ((recognised_student_status_new == "checkin")):
                connect = mysql.connector.connect(host="localhost", username="root", password="",
                                                  database="face_recognition")
                my_cursor = connect.cursor()

                timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
                query = "INSERT INTO attendence (id, name,roll_no,department,login_datetime,status)VALUES (%s,%s,%s,%s,%s,%s)"
                my_cursor.execute(query, (
                    "",
                    recognised_student_name,
                    recognised_student_roll,
                    recognised_student_dep,
                    timestamp, "checkout"
                ))
                connect.commit()
                connect.close()
        else:
            print("cant checkout")

    # ==============================face recognition===================================
    def face_recog(self):
        self.counter = 0

        def draw_boundary(img, classifier, scaleFactor, minNeighbors, color, text, clf):
            gray_image = cv2.cvtColor(img, cv2.COLOR_BGRA2GRAY)
            features = classifier.detectMultiScale(gray_image, scaleFactor, minNeighbors)
            coord = []

            for (x, y, w, h) in features:
                cv2.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 3)
                id, predict = clf.predict(gray_image[y:y + h, x:x + w])
                confidence = int((100 * (1 - predict / 300)))

                conn = mysql.connector.connect(host="localhost", username="root", password="",
                                               database="face_recognition")
                my_cursor = conn.cursor()

                my_cursor.execute("select student_name from student where student_id=" + str(id))
                recognised_student_name = my_cursor.fetchone()
                recognised_student_name = "+".join(recognised_student_name)

                my_cursor.execute("select roll_no from student where student_id=" + str(id))
                recognised_student_roll = my_cursor.fetchone()
                recognised_student_roll = "+".join(recognised_student_roll)

                my_cursor.execute("select department from student where student_id=" + str(id))
                recognised_student_dep = my_cursor.fetchone()
                recognised_student_dep = "+".join(recognised_student_dep)

                if confidence > 77:
                    cv2.putText(img, f"Roll:{recognised_student_roll}", (x, y - 55), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)
                    cv2.putText(img, f"Name:{recognised_student_name}", (x, y - 30), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)
                    cv2.putText(img, f"Department:{recognised_student_dep}", (x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)
                    self.counter += 1
                    if self.counter == 1:
                        self.mark_attendance(recognised_student_roll, recognised_student_name, recognised_student_dep)
                    else:
                        pass
                else:
                    cv2.rectangle(img(x, y), (x + w, y + h), (0, 0, 255), 3)
                    cv2.putText(img, "Unknown Face"(x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.8, (255, 255, 255), 3)
                coord = [x, y, w, h]
            return coord

        def recognize(img, clf, faceCascade):
            coord = draw_boundary(img, faceCascade, 1.1, 10, (255, 255, 255), "FACE", clf)
            return img

        faceCascade = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
        clf = cv2.face.LBPHFaceRecognizer_create()
        clf.read("classifier.xml")

        video_cap = cv2.VideoCapture(0)

        while TRUE:
            ret, img = video_cap.read()
            img = recognize(img, clf, faceCascade)
            cv2.imshow("welcome to face recognition", img)

            if cv2.waitKey(1) == 13:
                break
        video_cap.release()
        cv2.destroyAllWindows()

    def face_recog_check_out(self):
        self.counter = 0

        def draw_boundary(img, classifier, scaleFactor, minNeighbors, color, text, clf):
            gray_image = cv2.cvtColor(img, cv2.COLOR_BGRA2GRAY)
            features = classifier.detectMultiScale(gray_image, scaleFactor, minNeighbors)
            coord = []

            for (x, y, w, h) in features:
                cv2.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 3)
                id, predict = clf.predict(gray_image[y:y + h, x:x + w])
                confidence = int((100 * (1 - predict / 300)))

                conn = mysql.connector.connect(host="localhost", username="root", password="",
                                               database="face_recognition")
                my_cursor = conn.cursor()

                my_cursor.execute("select student_name from student where student_id=" + str(id))
                recognised_student_name = my_cursor.fetchone()
                recognised_student_name = "+".join(recognised_student_name)

                my_cursor.execute("select roll_no from student where student_id=" + str(id))
                recognised_student_roll = my_cursor.fetchone()
                recognised_student_roll = "+".join(recognised_student_roll)

                my_cursor.execute("select department from student where student_id=" + str(id))
                recognised_student_dep = my_cursor.fetchone()
                recognised_student_dep = "+".join(recognised_student_dep)
                print(recognised_student_dep)

                if confidence > 77:
                    cv2.putText(img, f"Roll:{recognised_student_roll}", (x, y - 55), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)
                    cv2.putText(img, f"Name:{recognised_student_name}", (x, y - 30), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)
                    cv2.putText(img, f"Department:{recognised_student_dep}", (x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.8,
                                (255, 255, 255), 3)
                    self.counter += 1
                    if self.counter == 1:
                        self.mark_attendance_check_out(recognised_student_roll, recognised_student_name,
                                                       recognised_student_dep)
                        PageTwo.(recognised_student_roll, recognised_student_name, recognised_student_dep)

                    else:
                        pass
                else:
                    cv2.rectangle(img(x, y), (x + w, y + h), (0, 0, 255), 3)
                    cv2.putText(img, "Unknown Face"(x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.8, (255, 255, 255), 3)
                coord = [x, y, w, h]
            return coord

        def recognize(img, clf, faceCascade):
            coord = draw_boundary(img, faceCascade, 1.1, 10, (255, 255, 255), "FACE", clf)
            return img

        faceCascade = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
        clf = cv2.face.LBPHFaceRecognizer_create()
        clf.read("classifier.xml")

        video_cap = cv2.VideoCapture(0)

        # def make_1080p():
        #     video_cap.set(3, 1920)
        #     video_cap.set(4, 1080)
        #
        # def make_720p():
        #     video_cap.set(3, 1280)
        #     video_cap.set(4, 720)
        #
        # def make_480p():
        #     video_cap.set(3, 640)
        #     video_cap.set(4, 480)
        #
        # def change_res(width, height):
        #     video_cap.set(3, width)
        #     video_cap.set(4, height)
        #
        # # make_480p()
        # # change_res(1230, 750)

        while TRUE:
            ret, img = video_cap.read()
            img = recognize(img, clf, faceCascade)
            cv2.imshow("welcome to face recognition", img)

            if cv2.waitKey(1) == 13:
                video_cap.release()
                cv2.destroyAllWindows()
            self.controller.show_frame("PageTwo")


class PageTwo(tk.Frame, faceRecognition):
    def __init__(self, parent, controller, recognised_student_roll, recognised_student_name,
                                                       recognised_student_dep):
        tk.Frame.__init__(self, parent)
        self.controller = controller
        label = tk.Label(self, text="This is page 2")
        label.pack(side="top", fill="x", pady=10)
        print(f"This is {recognised_student_dep}, {recognised_student_name}, {recognised_student_roll}")

        # self.label1 = tk.Label(self.master, text=recognised_student_dep)
        # self.label1.place(label, x=30, y=12)




if __name__ == "__main__":
    obj = Face_Recognition_System()
    obj.mainloop()