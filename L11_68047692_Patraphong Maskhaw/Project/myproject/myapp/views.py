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