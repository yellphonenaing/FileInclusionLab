## File Inclusion Lab


The lab is designed for **security testing / CTF practice** and runs inside a Docker container.

---

## 📚 Author / Credits

**Author:** Yell Phone Naing  
Created for **security learning & CTF practice**.

Happy hacking! 🚩


## 📦 Requirements

Make sure you have the following installed on your system:

- **Git**
- **Docker** (Docker Engine 20+ recommended)

Verify:

```bash
git --version
docker --version
```

---

## 📥 Step 1: Clone the Lab from GitHub

```bash
git clone https://github.com/yellphonenaing/FileInclusionLab
cd FileInclusionLab
```

---

## 🧱 Step 2: Build the Docker Image

From inside the project directory:

```bash
docker build -t file-inclusion-lab .
```

If build is successful, you will see:

```
Successfully built <image_id>
Successfully tagged file-inclusion-lab:latest
```

---

## 🚀 Step 3: Run the Docker Container

```bash
docker run -d \
  -p 8085:80 \
  --name file-inclusion-lab \
  file-inclusion-lab
```

---

## 🌐 Step 4: Access the Lab

Open your browser and go to:

```
http://localhost:8085
```
