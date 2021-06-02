from tkinter import *
from tkinter import ttk
from PIL import Image, ImageTk
from tkinter import messagebox
import mysql.connector
import cv2


class Student:
    def __init__(self, root):
        self.root = root
        self.root.maxsize(1300, 750)
        self.root.minsize(1300, 750)
        self.root.title("Face Recognition System")

        # Variables for ComboBox and Entry Field
        self.var_department = StringVar()
        self.var_course = StringVar()
        self.var_year = StringVar()
        self.var_semester = StringVar()
        self.var_student_id = StringVar()
        self.var_student_name = StringVar()
        self.var_div = StringVar()
        self.var_roll_no = StringVar()
        self.var_gender = StringVar()
        self.var_dob = StringVar()
        self.var_email = StringVar()
        self.var_phone = StringVar()
        self.var_address = StringVar()
        self.var_teacher = StringVar()

        # Variable for radio button
        self.var_radio_btn = StringVar()

        # First Image
        img = Image.open(r"images\2page-face-recognition-left.jpg")
        img = img.resize((435, 130), Image.ANTIALIAS)
        self.photoimg = ImageTk.PhotoImage(img)

        f_lbl = Label(self.root, image=self.photoimg)
        f_lbl.place(x=0, y=0, width=435, height=130)

        # Second Image
        img1 = Image.open(r"images\2page-face-recognition-center.jpg")
        img1 = img1.resize((435, 130), Image.ANTIALIAS)
        self.photoimg1 = ImageTk.PhotoImage(img1)

        f_lbl = Label(self.root, image=self.photoimg1)
        f_lbl.place(x=435, y=0, width=435, height=130)

        # Third Image
        img2 = Image.open(r"images\2page-face-recognition-right.jpg")
        img2 = img2.resize((435, 130), Image.ANTIALIAS)
        self.photoimg2 = ImageTk.PhotoImage(img2)

        f_lbl = Label(self.root, image=self.photoimg2)
        f_lbl.place(x=870, y=0, width=435, height=130)

        # Background Image
        img3 = Image.open(r"images\front-background.jpg")
        img3 = img3.resize((1300, 790), Image.ANTIALIAS)
        self.photoimg3 = ImageTk.PhotoImage(img3)

        bg_img = Label(self.root, image=self.photoimg3)
        bg_img.place(x=0, y=130, width=1530, height=790)

        # Title - face recognition
        title_lbl = Label(bg_img, text="STUDENT MANAGEMENT SYSTEM",
                          font=("times new roman", 35, "bold"), bg="white", fg="dark green")
        title_lbl.place(x=0, y=0, width=1300, height=45)

        # Main Frame
        main_frame = Frame(bg_img, bd=2, bg="white")
        main_frame.place(x=10, y=55, width=1275, height=750)

        # LeftLabel Frame
        Left_frame = LabelFrame(main_frame, bd=4, bg="white", relief=RIDGE, text="Student Details",
                                font=("times new roman", 12, "bold"))
        Left_frame.place(x=5, y=10, width=625, height=530)

        # Current Course Information
        Current_course_frame = LabelFrame(Left_frame, bd=4, bg="white", relief=RIDGE, text="Current Course Information",
                                          font=("times new roman", 12, "bold"))
        Current_course_frame.place(x=5, y=15, width=608, height=150)

        def pick_book(self):
            conn = mysql.connector.connect(host="localhost", username="root", password="", database="face_recognition")
            my_cursor = conn.cursor()
            sem = semester_combo.get()
            dep = department_combo.get()
            my_cursor.execute("SELECT book_name from book WHERE semester=%s AND department=%s", (sem, dep,))
            data = my_cursor.fetchall()
            my_list = [r for r in data]
            course_combo.config(value=my_list)
            conn.commit()
            conn.close()

        # 1 - Department Label
        department_label = Label(Current_course_frame, text="Department", font=('yu gothic ui semibold', 12, 'bold'),
                                 bg="white")
        department_label.grid(row=0, column=0, padx=10, sticky=W)

        # 1 - Department ComboBox
        department_combo = ttk.Combobox(Current_course_frame, textvariable=self.var_department,
                                        font=('yu gothic ui semibold', 12, 'bold'), state="readonly", width=20)
        department_combo.option_add("*TCombobox*Listbox.selectBackground", "#DC143C")
        department_combo.option_add("*TCombobox*Listbox.foreground", "black")
        department_combo["values"] = ("Select Department", "Computer Science", "Electronics", "Civil", "Electrical", "AutoMobile")
        department_combo.current(0)
        department_combo.bind("<<ComboboxSelected>>", pick_book)
        department_combo.grid(row=0, column=1, padx=2, pady=20, sticky=W)

        # 2 - Course Label
        course_label = Label(Current_course_frame, text="Course", font=('yu gothic ui semibold', 12, 'bold'), bg="white")
        course_label.grid(row=0, column=2, padx=10, sticky=W)

        # 2 - Course ComboBox
        course_combo = ttk.Combobox(Current_course_frame, textvariable=self.var_course,
                                    font=('yu gothic ui semibold', 12, 'bold'), state="readonly", width=18,
                                    values=["Select Course"])
        course_combo.current(0)
        course_combo.grid(row=0, column=3, padx=2, pady=20, sticky=W)

        # 3 - Semester Label
        semester_label = Label(Current_course_frame, text="Semester", font=('yu gothic ui semibold', 12, 'bold'),
                               bg="white")
        semester_label.grid(row=1, column=0, padx=10, sticky=W)

        # 3 - Semester ComboBox
        semester_combo = ttk.Combobox(Current_course_frame, textvariable=self.var_semester,
                                      font=('yu gothic ui semibold', 12, 'bold'), state="readonly", width=20)
        semester_combo["values"] = ("Select Semester", "1", "2", "3", "4", "5", "6")
        semester_combo.current(0)
        semester_combo.bind("<<ComboboxSelected>>", pick_book)
        semester_combo.grid(row=1, column=1, padx=2, pady=20, sticky=W)

        # 4 - Year Label
        year_label = Label(Current_course_frame, text="Year", font=('yu gothic ui semibold', 12, 'bold'), bg="white")
        year_label.grid(row=1, column=2, padx=10, sticky=W)

        # 4 - Year ComboBox
        year_combo = ttk.Combobox(Current_course_frame, textvariable=self.var_year,
                                  font=('yu gothic ui semibold', 12, 'bold'), state="readonly", width=18)
        year_combo["values"] = (
            "Select Year", "2021-2022", "2022-2023", "2023-2024", "2024-2025", "2025-2026", "2026-2027")
        year_combo.current(0)
        year_combo.grid(row=1, column=3, padx=2, pady=20, sticky=W)

        # Student Information
        class_Student_frame = LabelFrame(Left_frame, bd=4, bg="white", relief=RIDGE, text="Student Information",
                                         font=("times new roman", 12, "bold"))
        class_Student_frame.place(x=5, y=190, width=608, height=300)

        # 1 - Student Id Label
        studentId_label = Label(class_Student_frame, text="Student ID:", font=('yu gothic ui semibold', 13, 'bold'),
                                bg="white")
        studentId_label.grid(row=0, column=0, padx=10, pady=5, sticky=W)

        # 1 - Student Id Entry

        studentId_entry = Entry(class_Student_frame, textvariable=self.var_student_id, width=15, highlightthickness=0, bg="white", relief=FLAT,
                                font=("yu gothic ui semibold", 12))
        studentId_entry.grid(row=0, column=1, padx=10, pady=5, sticky=W)

        studentId_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        studentId_line.place(x=150, y=25)

        # 2 - Student Name Label
        studentId_label = Label(class_Student_frame, text="Student Name:", font=('yu gothic ui semibold', 13, 'bold'),
                                bg="white")
        studentId_label.grid(row=0, column=2, padx=10, pady=5, sticky=W)

        # 2 - Student Name Entry
        student_Name_entry = Entry(class_Student_frame, textvariable=self.var_student_name, width=15, highlightthickness=0, bg="white", relief=FLAT,
                                font=("yu gothic ui semibold", 12))
        student_Name_entry.grid(row=0, column=3, padx=10, pady=5, sticky=W)

        studentName_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        studentName_line.place(x=454, y=25)

        # 3 - Class Division Label
        class_division_label = Label(class_Student_frame, text="Class Division:", font=('yu gothic ui semibold', 13, 'bold'),
                                     bg="white")
        class_division_label.grid(row=1, column=0, padx=10, pady=5, sticky=W)

        # 3 - Class Division Entry
        class_division_entry = Entry(class_Student_frame, textvariable=self.var_div, width=15, highlightthickness=0, bg="white", relief=FLAT,
                                font=("yu gothic ui semibold", 12))
        class_division_entry.grid(row=1, column=1, padx=10, pady=5, sticky=W)

        class_division_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        class_division_line.place(x=150, y=60)

        # 4 - Roll No. Label
        roll_no_label = Label(class_Student_frame, text="Roll No:", font=('yu gothic ui semibold', 13, 'bold'),
                              bg="white")
        roll_no_label.grid(row=1, column=2, padx=10, pady=5, sticky=W)

        # 4 - Roll No. Entry
        roll_no_entry = Entry(class_Student_frame, textvariable=self.var_roll_no, width=15, highlightthickness=0, bg="white", relief=FLAT,
                                font=("yu gothic ui semibold", 12))
        roll_no_entry.grid(row=1, column=3, padx=10, pady=5, sticky=W)

        roll_no_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        roll_no_line.place(x=454, y=60)

        # 5 - Gender Label
        gender_label = Label(class_Student_frame, text="Gender:", font=('yu gothic ui semibold', 13, 'bold'),
                             bg="white")
        gender_label.grid(row=2, column=0, padx=10, pady=5, sticky=W)

        # 5 - Gender CombBox
        gender_combo = ttk.Combobox(class_Student_frame, textvariable=self.var_gender,
                                    font=("times new roman", 13, "bold"), state="readonly", width=13)
        gender_combo["values"] = ("Male", "Female", "Other")
        gender_combo.current(0)
        gender_combo.grid(row=2, column=1, padx=10, pady=5, sticky=W)

        # 6 - DOB Label
        dob_label = Label(class_Student_frame, text="DOB:", font=('yu gothic ui semibold', 13, 'bold'), bg="white")
        dob_label.grid(row=2, column=2, padx=10, pady=5, sticky=W)

        # 6 - DOB Entry
        dob_entry = Entry(class_Student_frame, textvariable=self.var_dob, width=15, highlightthickness=0,
                             bg="white", relief=FLAT,
                             font=("yu gothic ui semibold", 12))
        dob_entry.insert(0, "mm/dd/yyyy")
        dob_entry.configure(state=DISABLED)
        dob_entry.grid(row=2, column=3, padx=10, pady=5, sticky=W)

        def on_click(event):
            dob_entry.configure(state=NORMAL)
            dob_entry.delete(0, END)

            # make the callback only work once
            dob_entry.unbind('<Button-1>', on_click_id)

        on_click_id = dob_entry.bind('<Button-1>', on_click)

        dob_entry_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        dob_entry_line.place(x=454, y=95)

        # 7 - Email Label
        email_label = Label(class_Student_frame, text="Email:", font=('yu gothic ui semibold', 13, 'bold'),
                            bg="white")
        email_label.grid(row=3, column=0, padx=10, pady=5, sticky=W)

        # 7 - Email Entry
        email_entry = Entry(class_Student_frame, textvariable=self.var_email, width=15, highlightthickness=0,
                             bg="white", relief=FLAT,
                             font=("yu gothic ui semibold", 12))
        email_entry.grid(row=3, column=1, padx=10, pady=5, sticky=W)

        email_entry_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        email_entry_line.place(x=150, y=130)

        # 8 - Phone No. Label
        phone_no_label = Label(class_Student_frame, text="Phone No:", font=('yu gothic ui semibold', 13, 'bold'),
                               bg="white")
        phone_no_label.grid(row=3, column=2, padx=10, pady=5, sticky=W)

        # 8 - Phone No. Entry
        phone_no_entry = Entry(class_Student_frame, textvariable=self.var_phone, width=15, highlightthickness=0,
                             bg="white", relief=FLAT,
                             font=("yu gothic ui semibold", 12))
        phone_no_entry.grid(row=3, column=3, padx=10, pady=5, sticky=W)

        phone_no_entry_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        phone_no_entry_line.place(x=454, y=130)

        # 9 - Address Label
        address_label = Label(class_Student_frame, text="Address:", font=('yu gothic ui semibold', 13, 'bold'),
                              bg="white")
        address_label.grid(row=4, column=0, padx=10, pady=5, sticky=W)

        # 9 - Address Entry
        address_entry = Entry(class_Student_frame, textvariable=self.var_address, width=15, highlightthickness=0,
                             bg="white", relief=FLAT,
                             font=("yu gothic ui semibold", 12))
        # address_entry.insert(END, 'default text')
        address_entry.grid(row=4, column=1, padx=10, pady=5, sticky=W)

        address_entry_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        address_entry_line.place(x=150, y=165)

        # 10 - Teacher Name Label
        teacher_name_label = Label(class_Student_frame, text="Teacher Name:", font=('yu gothic ui semibold', 13, 'bold'),
                                   bg="white")
        teacher_name_label.grid(row=4, column=2, padx=10, pady=5, sticky=W)

        # 10 - Teacher Name Entry
        teacher_name_entry = Entry(class_Student_frame, textvariable=self.var_teacher, width=15, highlightthickness=0,
                             bg="white", relief=FLAT,
                             font=("yu gothic ui semibold", 12))
        teacher_name_entry.grid(row=4, column=3, padx=10, pady=5, sticky=W)

        email_entry_line = Canvas(class_Student_frame, width=140, height=1.3, bg="#393939", highlightthickness=0)
        email_entry_line.place(x=454, y=165)

        # Radio Buttons
        radiobtn1 = ttk.Radiobutton(class_Student_frame, variable=self.var_radio_btn, text="Take Photo Sample",
                                    value="Yes")
        radiobtn1.grid(row=6, column=0)

        radiobtn2 = ttk.Radiobutton(class_Student_frame, variable=self.var_radio_btn, text="No Photo Sample",
                                    value="No")
        radiobtn2.grid(row=6, column=1)

        # Buttons Frame for save, update, delete and update
        btn_frame = Frame(class_Student_frame, bd=2, relief=RIDGE)
        btn_frame.place(x=3, y=194, width=596, height=70)

        save_btn = Button(btn_frame, text="Save", command=self.add_data, width=14, font=("times new roman", 13, "bold"),
                          bg="blue", fg="white")
        save_btn.grid(row=0, column=0)

        update_btn = Button(btn_frame, text="Update", command=self.update_data, width=14,
                            font=("times new roman", 13, "bold"), bg="blue",
                            fg="white")
        update_btn.grid(row=0, column=1)

        delete_btn = Button(btn_frame, text="Delete", command=self.delete_data, width=14,
                            font=("times new roman", 13, "bold"), bg="blue",
                            fg="white")
        delete_btn.grid(row=0, column=2)

        reset_btn = Button(btn_frame, text="Reset", command=self.reset_data, width=14,
                           font=("times new roman", 13, "bold"), bg="blue",
                           fg="white")
        reset_btn.grid(row=0, column=3)

        # Button Frame for take and update photo sample
        btn_frame1 = Frame(class_Student_frame, bd=2, relief=RIDGE, bg="white")
        btn_frame1.place(x=5, y=229, width=593, height=38)

        take_photo_btn = Button(btn_frame1, text="Take Photo Sample", width=29, command=self.generate_dataset,
                                font=("times new roman", 13, "bold"),
                                bg="blue", fg="white")
        take_photo_btn.grid(row=0, column=0)

        update_photo_btn = Button(btn_frame1, text="Update Photo Sample", width=28,
                                  font=("times new roman", 13, "bold"), bg="blue", fg="white")
        update_photo_btn.grid(row=0, column=1)

        # Right LabelFrame
        Right_frame = LabelFrame(main_frame, bd=4, bg="white", relief=RIDGE, text="Student Details",
                                 font=("times new roman", 12, "bold"))
        Right_frame.place(x=640, y=10, width=625, height=530)

        # Image On Right Frame
        img_right = Image.open(r"images\current_course.jpg")
        img_right = img_right.resize((608, 130), Image.ANTIALIAS)
        self.photoimg_right = ImageTk.PhotoImage(img_right)

        f_lbl = Label(Right_frame, image=self.photoimg_right)
        f_lbl.place(x=5, y=0, width=608, height=130)

        # Search LabelFrame
        Search_frame = LabelFrame(Right_frame, bd=4, bg="white", relief=RIDGE, text="Search System",
                                  font=("times new roman", 12, "bold"))
        Search_frame.place(x=2, y=135, width=612, height=74)

        # Search Label
        Search_label = Label(Search_frame, text="Search By:", font=("times new roman", 13, "bold"), bg="white")
        Search_label.grid(row=0, column=0, padx=3, pady=10, sticky=W)

        # Search Combobox
        Search_combo = ttk.Combobox(Search_frame, font=("times new roman", 13, "bold"), state="readonly", width=13)
        Search_combo["values"] = ("Select", "Roll_No", "Phone_No")
        Search_combo.current(0)
        Search_combo.grid(row=0, column=1, padx=0, pady=10, sticky=W)

        Search_entry = ttk.Entry(Search_frame, width=15, font=("times new roman", 13, "bold"))
        Search_entry.grid(row=0, column=2, padx=6, pady=5, sticky=W)

        # Search Button
        Search_btn = Button(Search_frame, text="Search", width=9, font=("times new roman", 13, "bold"), bg="blue",
                            fg="white")
        Search_btn.grid(row=0, column=3, padx=2)

        # Show All Button
        showAll_btn = Button(Search_frame, text="Show All", width=9, font=("times new roman", 13, "bold"), bg="blue",
                             fg="white")
        showAll_btn.grid(row=0, column=4, padx=10)

        # Table Frame
        table_frame = Frame(Right_frame, bd=4, relief=RIDGE, bg="white")
        table_frame.place(x=4, y=218, width=610, height=280)

        # Scrollbar
        scroll_x = ttk.Scrollbar(table_frame, orient=HORIZONTAL)
        scroll_y = ttk.Scrollbar(table_frame, orient=VERTICAL)

        self.student_table = ttk.Treeview(table_frame, column=(
            "dep", "course", "year", "sem", "id", "name", "div", "roll", "gender", "dob", "email", "phone", "address",
            "teacher", "photo"), xscrollcommand=scroll_x.set, yscrollcommand=scroll_y.set)

        scroll_x.pack(side=BOTTOM, fill=X)
        scroll_y.pack(side=RIGHT, fill=Y)
        scroll_x.config(command=self.student_table.xview)
        scroll_y.config(command=self.student_table.yview)

        self.student_table.heading("dep", text="Department")
        self.student_table.heading("course", text="Course")
        self.student_table.heading("year", text="Year")
        self.student_table.heading("sem", text="Semester")
        self.student_table.heading("id", text="StudentId")
        self.student_table.heading("name", text="Name")
        self.student_table.heading("div", text="Division")
        self.student_table.heading("roll", text="RollNo")
        self.student_table.heading("gender", text="Gender")
        self.student_table.heading("dob", text="DOB")
        self.student_table.heading("email", text="Email")
        self.student_table.heading("phone", text="Phone")
        self.student_table.heading("address", text="Address")
        self.student_table.heading("teacher", text="Teacher")
        self.student_table.heading("photo", text="Photo")
        self.student_table["show"] = "headings"

        self.student_table.pack(fill=BOTH, expand=1)
        self.student_table.bind("<ButtonRelease>", self.get_cursor)
        self.fetch_data()

    # ------------------ add data in database ----------------------
    def add_data(self):
        if self.var_department.get() == "Select Department" or self.var_student_name.get() == "":
            messagebox.showerror("Error", "All Fields Are Required!", parent=self.root)
        else:
            try:
                conn = mysql.connector.connect(host="localhost", username="root", password="",
                                               database="face_recognition")
                my_cursor = conn.cursor()
                my_cursor.execute("insert into student values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", (
                    self.var_department.get(),
                    self.var_course.get(),
                    self.var_year.get(),
                    self.var_semester.get(),
                    self.var_student_id.get(),
                    self.var_student_name.get(),
                    self.var_div.get(),
                    self.var_roll_no.get(),
                    self.var_gender.get(),
                    self.var_dob.get(),
                    self.var_email.get(),
                    self.var_phone.get(),
                    self.var_address.get(),
                    self.var_teacher.get(),
                    self.var_radio_btn.get()
                ))

                conn.commit()
                self.fetch_data()
                conn.close()
                messagebox.showinfo("Success", "Student Details have been added successfully", parent=self.root)
            except Exception as es:
                messagebox.showerror("Error", f"Due To :{str(es)}", parent=self.root)

    # ----------------------------------- fetch data from database into table --------------------------------------
    def fetch_data(self):
        conn = mysql.connector.connect(host="localhost", username="root", password="", database="face_recognition")
        my_cursor = conn.cursor()
        my_cursor.execute("select * from student")
        data = my_cursor.fetchall()

        if len(data) != 0:
            self.student_table.delete(*self.student_table.get_children())
            for i in data:
                self.student_table.insert("", END, values=i)
            conn.commit()
        conn.close()

    #     --------------------------- get cursor -----------------------------
    def get_cursor(self, event=""):
        cursor_focus = self.student_table.focus()
        content = self.student_table.item(cursor_focus)
        data = content["values"]

        self.var_department.set(data[0]),
        self.var_course.set(data[1]),
        self.var_year.set(data[2]),
        self.var_semester.set(data[3]),
        self.var_student_id.set(data[4]),
        self.var_student_name.set(data[5]),
        self.var_div.set(data[6]),
        self.var_roll_no.set(data[7]),
        self.var_gender.set(data[8]),
        self.var_dob.set(data[9]),
        self.var_email.set(data[10]),
        self.var_phone.set(data[11]),
        self.var_address.set(data[12]),
        self.var_teacher.set(data[13]),
        self.var_radio_btn.set(data[14])

    # ------------------------- update function ---------------------------
    def update_data(self):
        if self.var_department.get() == "Select Department" or self.var_student_name.get() == "":
            messagebox.showerror("Error", "All Fields Are Required!", parent=self.root)
        else:
            try:
                update = messagebox.askyesno("Update", "Do You Want To Update This Student Details!", parent=self.root)
                if update > 0:
                    conn = mysql.connector.connect(host="localhost", username="root", password="",
                                                   database="face_recognition")
                    my_cursor = conn.cursor()
                    my_cursor.execute(
                        "update student set department=%s, course=%s, year=%s, semester=%s, student_name=%s, division=%s, roll_no=%s, gender=%s, dob=%s, email=%s, phone=%s, address=%s, teacher=%s, photo_sample=%s where student_id=%s",
                        (
                            self.var_department.get(),
                            self.var_course.get(),
                            self.var_year.get(),
                            self.var_semester.get(),
                            self.var_student_name.get(),
                            self.var_div.get(),
                            self.var_roll_no.get(),
                            self.var_gender.get(),
                            self.var_dob.get(),
                            self.var_email.get(),
                            self.var_phone.get(),
                            self.var_address.get(),
                            self.var_teacher.get(),
                            self.var_radio_btn.get(),
                            self.var_student_id.get(),
                        ))
                else:
                    if not update:
                        return
                messagebox.showinfo("Success", "Student Details Updated Successfully!", parent=self.root)
                conn.commit()
                self.fetch_data()
                conn.close()
            except Exception as es:
                messagebox.showerror("Error", f"Due To:{str(es)}", parent=self.root)

    # ------------------------------- Delete Data ------------------------------------------------------------------

    def delete_data(self):
        if self.var_student_id == "":
            messagebox.showerror("Error", "Student Id is Required!", parent=self.root)
        else:
            try:
                delete = messagebox.askyesno("Success", "Do You Want To Delete This Data!", parent=self.root)
                if delete > 0:
                    conn = mysql.connector.connect(host="localhost", username="root", password="",
                                                   database="face_recognition")
                    my_cursor = conn.cursor()
                    my_cursor.execute("delete from student where student_id=%s", (self.var_student_id.get(),))
                else:
                    if not delete:
                        return
                conn.commit()
                self.fetch_data()
                conn.close()
                messagebox.showinfo("Success", "Student Details Deleted Successfully!", parent=self.root)
            except Exception as es:
                messagebox.showerror("Error", f"Due To:{str(es)}", parent=self.root)

    #     --------------------------------------- Reset Data ----------------------------------------------
    def reset_data(self):
        self.var_department.set("Select Department"),
        self.var_course.set("Select Course"),
        self.var_year.set("Select Year"),
        self.var_semester.set("Select Semester"),
        self.var_student_name.set(""),
        self.var_div.set(""),
        self.var_roll_no.set(""),
        self.var_gender.set("Male"),
        self.var_dob.set(""),
        self.var_email.set(""),
        self.var_phone.set(""),
        self.var_address.set(""),
        self.var_teacher.set(""),
        self.var_radio_btn.set(""),
        self.var_student_id.set("")

    #    ---------------------------------------- Generate data set or take photo sample ----------------------------------------------
    def generate_dataset(self):
        if self.var_department == "Select Department" or self.var_student_name == "":
            messagebox.showerror("Error", "All Fields Are Required!", parent=self.root)
        else:
            try:
                conn = mysql.connector.connect(host="localhost", username="root", password="",
                                               database="face_recognition")
                my_cursor = conn.cursor()
                my_cursor.execute("select * from student")
                myresult = my_cursor.fetchall()
                id = 0
                for i in myresult:
                    id += 1
                my_cursor.execute(
                    "update student set department=%s, course=%s, year=%s, semester=%s, student_name=%s, division=%s, roll_no=%s, gender=%s, dob=%s, email=%s, phone=%s, address=%s, teacher=%s, photo_sample=%s where student_id=%s",
                    (self.var_department.get(),
                     self.var_course.get(),
                     self.var_year.get(),
                     self.var_semester.get(),
                     self.var_student_name.get(),
                     self.var_div.get(),
                     self.var_roll_no.get(),
                     self.var_gender.get(),
                     self.var_dob.get(),
                     self.var_email.get(),
                     self.var_phone.get(),
                     self.var_address.get(),
                     self.var_teacher.get(),
                     self.var_radio_btn.get(),
                     self.var_student_id.get() == id + 1
                     ))
                conn.commit()
                self.fetch_data()
                self.reset_data()
                conn.close()

                #     ------------ Load predefined data of face frontal from opencv for object detection--------------------
                face_classifier = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")

                def face_cropped(img):
                    images = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

                    # Detect faces of different sizes
                    faces = face_classifier.detectMultiScale(images, 1.3, 5)
                    #                                       scaling factor=1.3 (how much the image size is reduced at each image scale)
                    #                                       minimum neighbor=5 (affect the quality of the detected faces)
                    # Generate Rectangle
                    for (x, y, w, h) in faces:
                        face_cropped = img[y:y + h, x:x + w]
                        return face_cropped

                capture = cv2.VideoCapture(1)
                capture.set(3, 1280)
                capture.set(4, 720)
                img_id = 0
                while True:
                    ret, my_frame = capture.read()
                    if face_cropped(my_frame) is not None:
                        img_id += 1
                        face = cv2.resize(face_cropped(my_frame), (450, 450))
                        face = cv2.cvtColor(face, cv2.COLOR_BGR2GRAY)
                        file_name_path = "data/user." + str(id) + "." + str(img_id) + ".jpg"
                        cv2.imwrite(file_name_path, face)
                        cv2.putText(face, str(img_id), (50, 50), cv2.FONT_HERSHEY_COMPLEX, 2, (0, 255, 0), 2)
                        cv2.imshow("Cropped Face", face)

                    if cv2.waitKey(1) == 13 or int(img_id == 100):
                        break
                capture.release()
                cv2.destroyAllWindows()
                messagebox.showinfo("Result", "Generating data sets completed!")
            except Exception as es:
                messagebox.showerror("Error", f"Due To:{str(es)}", parent=self.root)


if __name__ == "__main__":
    root = Tk()
    obj = Student(root)
    root.mainloop()
