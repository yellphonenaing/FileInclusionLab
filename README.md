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
git clone https://github.com/yellphonenaing/DirectoryTraversalAndSSRFLabs
cd DirectoryTraversalAndSSRFLabs
```

---

## 🧱 Step 2: Build the Docker Image

From inside the project directory:

```bash
docker build -t directory-traversal-ssrf-labs .
```

If build is successful, you will see:

```
Successfully built <image_id>
Successfully tagged directory-traversal-ssrf-labs:latest
```

---

## 🚀 Step 3: Run the Docker Container

```bash
docker run -d \
  -p 8082:80 \
  --name directory-traversal-ssrf-labs \
  directory-traversal-ssrf-labs
```

---

## 🌐 Step 4: Access the Lab

Open your browser and go to:

```
http://localhost:8085
```
