from django.shortcuts import render
from django.http import HttpResponse
from .models import Person
# Create your views here.
def index(request):
    persons = Person.objects.all()
    return render(request, 'index.html', {'persons': persons})

def about(request):
    return render(request,"about.html")

def form(request):
    return render(request, "form.html")
