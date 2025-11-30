# **BDTax.com.bd – Online Tax Filing Platform**

Bangladesh’s first and most widely used **online tax filing system**, helping taxpayers prepare and submit their personal income tax returns easily, securely, and in full compliance with Bangladeshi tax laws.

---

## **📌 Overview**

BDTax.com.bd has been operational since **2014**, providing a guided, user-friendly, and legally compliant digital tax filing experience. This platform automates tax calculations, manages necessary documents, and generates **government-office-submittable PDF files** at the end of the process.

If users face any issues or confusions during tax preparation, **experienced tax lawyers** assist them through the full process.

---

## **🌐 Website**

**[https://bdtax.com.bd](https://bdtax.com.bd)**

---

## **🛠️ Tech Stack**

| Technology     | Usage                                | Percentage |
| -------------- | ------------------------------------ | ---------- |
| **PHP**        | Backend, core business logic         | 59.3%      |
| **JavaScript** | Frontend interactivity, UI workflows | 34.3%      |
| **CSS**        | Styling & layout                     | 3.2%       |
| **HTML**       | Markup & template rendering          | 3.1%       |

---

## **📁 Project Structure**

```
project_root/
│
├── Database_bk/          # Backup or exported database files
├── assets/               # Frontend static assets (images, icons, scripts, etc.)
├── cgi-bin/              # Scripts executed on the server (if applicable)
├── css/                  # Stylesheets
├── fonts/                # Custom or web fonts
├── framework/            # Internal or third-party PHP framework components
├── images/               # Image assets
├── img/                  # Additional images (legacy folder)
├── import_data/          # Data import files or templates
├── js/                   # JavaScript files
├── protected/            # Secure application logic, configs, controllers, models
│
├── error_log             # Server/PHP error log
├── favicon.ico           # Favicon for browser tabs
├── .gitattributes        # Git attributes configuration
├── .gitignore            # Git ignore rules
└── index.php             # Application entry point
```

---

## **✨ Key Features**

### **1. Guided Tax Filing**

* Interactive workflows
* Personalized tax calculations
* Step-by-step instructions

### **2. Automated Document Handling**

* Upload and manage required tax documents
* Secure cloud storage
* Easy retrieval anytime

### **3. Compliance with Bangladesh Tax Law**

* Updated tax rules every assessment year
* Automatic validation to avoid errors

### **4. Generate Submission-Ready PDF**

* A fully compliant return file
* Accepted in government tax offices
* Includes detailed statements & forms

### **5. Expert Support**

* Real-time help from professional tax lawyers
* Clarifications for complex tax scenarios

### **6. Security & Privacy**

* Industry-standard encryption
* Protection of personal and financial data
* Secure authentication flow

---

## **🚀 Getting Started (Development)**

### **Prerequisites**

* PHP 7.x / 8.x
* MySQL or MariaDB
* Apache or Nginx
* Composer (if using dependencies inside the framework folder)

### **Installation**

```bash
git clone https://github.com/<your-repo>/bdtax.git
cd bdtax
```

Configure environment variables / database settings inside:

```
protected/config/
```

Launch locally using your preferred stack (XAMPP / LAMP / Laragon / Docker).

---

## **🗃️ Backup & Database**

* All backup SQL files are stored in `Database_bk/`
* Import into MySQL before starting the server
* Ensure correct DB credentials in configuration files

---

## **📜 License**

This project is proprietary and may contain confidential business logic.
**Unauthorized copying or distribution is prohibited.**

---

## **🤝 Contribution**

For internal team use only.
Please follow Git branching guidelines:

* `main` → Production
* `dev` → Development
* Feature branches → `feature/<name>`

Submit merge requests for review before merging.

---

## **📞 Support / Contact**

For platform-related inquiries or collaboration:

**Email:** [support@bdtax.com.bd](mailto:support@bdtax.com.bd)
**Website:** [https://bdtax.com.bd](https://bdtax.com.bd)
