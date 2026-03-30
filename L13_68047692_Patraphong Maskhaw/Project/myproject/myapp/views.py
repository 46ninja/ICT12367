from django.shortcuts import render, redirect
from django.http import HttpResponse
from .models import Person

# ฟังก์ชันหน้าแรก (เพิ่มระบบค้นหา)
def index(request):
    # รับค่าคำค้นหาจากช่องค้นหา
    query = request.GET.get('search_query', '')
    
    # ถ้ามีการพิมพ์คำค้นหาเข้ามา ให้กรองชื่อ
    if query:
        persons = Person.objects.filter(name__icontains=query)
    else:
        # ถ้าไม่มี ให้แสดงทั้งหมด
        persons = Person.objects.all()
        
    return render(request, 'index.html', {'persons': persons, 'query': query})

def about(request):
    return render(request, "about.html")

def form(request):
    if request.method == "POST":
        name = request.POST.get('name')
        age = request.POST.get('age')
        
        if name and age:
            Person.objects.create(name=name, age=age)
            return redirect('/') 
            
    return render(request, "form.html")

def delete_person(request, id):
    person = Person.objects.get(id=id)
    person.delete()
    return redirect('/')

def edit_person(request, id):
    person = Person.objects.get(id=id)
    
    if request.method == "POST":
        person.name = request.POST.get('name')
        person.age = request.POST.get('age')
        person.save()
        return redirect('/')
        
    return render(request, 'edit.html', {'person': person})