from django.shortcuts import render, redirect  # <--- เพิ่ม redirect ตรงนี้
from django.http import HttpResponse
from .models import Person

# Create your views here.
def index(request):
    persons = Person.objects.all()
    return render(request, 'index.html', {'persons': persons})

def about(request):
    return render(request, "about.html")

def form(request):
    # ---- เพิ่มส่วนนี้เพื่อเช็คการส่งข้อมูล ----
    if request.method == "POST":
        # รับค่า name และ age จากฟอร์ม
        name = request.POST.get('name')
        age = request.POST.get('age')
        
        # ตรวจสอบว่ากรอกข้อมูลมาครบไหม แล้วบันทึกลงฐานข้อมูล
        if name and age:
            Person.objects.create(name=name, age=age)
            # บันทึกเสร็จ ให้เด้งกลับไปหน้าแรก (หน้า index)
            return redirect('/') 
    # ------------------------------------

    # ถ้าเข้าหน้าเว็บปกติ (ยังไม่ได้กดปุ่ม) ก็แสดงหน้าฟอร์มเหมือนเดิม
    return render(request, "form.html")

# ฟังก์ชันสำหรับลบข้อมูล
def delete_person(request, id):
    # ค้นหาข้อมูลจาก id ที่ส่งมา
    person = Person.objects.get(id=id)
    person.delete() # สั่งลบ
    return redirect('/') # ลบเสร็จให้กลับไปหน้าแรก

# ฟังก์ชันสำหรับแก้ไขข้อมูล
def edit_person(request, id):
    # ค้นหาข้อมูลเดิมมาเตรียมไว้ก่อน
    person = Person.objects.get(id=id)
    
    # ถ้ามีการกดปุ่ม "บันทึกการแก้ไข" (ส่งแบบ POST)
    if request.method == "POST":
        person.name = request.POST.get('name')
        person.age = request.POST.get('age')
        person.save() # สั่งอัปเดตข้อมูล
        return redirect('/') # แก้ไขเสร็จกลับหน้าแรก
        
    # ถ้าแค่กดปุ่ม "แก้ไข" เข้ามา ให้ส่งข้อมูลเดิมไปแสดงในหน้า edit.html
    return render(request, 'edit.html', {'person': person})