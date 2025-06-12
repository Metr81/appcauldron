# AppCauldron - **Elabora tu aplicación web.**  


Proyecto final del Ciclo de Grado Superior en Administración de Sistemas Informáticos en Red (ASIR).

---

## ¿Qué es AppCauldron?

AppCauldron es una solución web construida con Apache, PHP y Bash scripting que permite seleccionar servicios como Moodle, Wordpress, MySQL, entre otros, desde un formulario web denominado "The Cauldron".
El sistema genera automáticamente una configuración `docker-compose.yaml` para orquestar estos servicios en contenedores.

---

## 🧩 Funcionalidades

- Generación automática de configuración `docker-compose.yaml` según servicios seleccionados.
- Documentación dinámica de los servicios (usuarios, contraseñas, enlaces).
- Scripts Bash para lanzar, detener, eliminar y consultar contenedores.
- Interfaz web estructurada:  
  - **El Caldero:** selecciona servicios  
  - **Hechizos:** gestiona contenedores  
  - **Grimorio:** consulta información  
  - **Contemplar el universo:** monitoriza estado de Docker

---

## 🗃️ Estructura del Proyecto
```
appcauldron/
├── scripts/ # Scripts de automatización (bash)
├── templates/ # Plantillas YAML para servicios
├── public/ # Interfaz web (PHP + HTML)
├── spell.yaml # Ejemplo de salida generada
├── grimoire.txt # Documentación dinámica generada
├── README.md
└── LICENSE.md
```
---

## ⚙️ Requisitos

- Instalar [Ubuntu 22.04.1 Desktop](https://old-releases.ubuntu.com/releases/22.04.1/ubuntu-22.04.1-desktop-amd64.iso)
- Instalar Apache2

Instalamos y comprobamos apache2
```
sudo apt update
sudo apt install apache2
sudo systemctl status apache2
```
Si al ejecutar el status aparece el error AH00558, editamos el archivo apache2.conf y añadimos al final:

ServerName 127.0.0.1
```
sudo nano /etc/apache2/apache2.conf
```
Comprobamos y reiniciamos el servicio apache2
```
sudo apachectl configtest
sudo systemctl reload apache2.service
```
Activamos el firewall ufw y lo configuramos para abrir los puertos 80 y 443, habilitando el perfil 'Apache Full', que incluye reglas para ambos puertos:
```
sudo ufw allow 'Apache Full'
sudo ufw enable
sudo ufw status
```

- PHP
- Docker + docker-compose

---

## 📦 Servicios utilizados y disponibles en AppCauldron

A través de los enlaces podéis acceder a las imágenes utilizadas y su documentación:

- 🧱 [MySQL – Imagen Oficial](https://hub.docker.com/_/mysql) – Base de Datos
- 🖥️ [Nginx - Imagen Oficial](https://hub.docker.com/_/nginx) – Servidor Web
- 🧰 [Pure-FTPd - Imagen Andrew Stilliard](https://github.com/stilliard/docker-pure-ftpd) – Servidor FTP
- 🔎 [Netdata - Imagen Oficial](https://hub.docker.com/r/netdata/netdata) – Monitorización
- 🎓 [Moodle - Imagen Bitnami](https://github.com/bitnami/containers/tree/main/bitnami/moodle) – Gestión de aprendizaje
- 📡 [Jitsi Meet - Imagen Oficial](https://github.com/jitsi/docker-jitsi-meet) – Videoconferencia
- 🌐 [Wordpress - Imagen Oficial](https://hub.docker.com/_/wordpress) – Wordpress
- 📝 [WPS Office - Imagen linuxserver.io](https://hub.docker.com/r/linuxserver/wps-office) – Office

---

## 🧪 Casos de uso

- Prácticas de estudiantes en administración de sistemas y DevOps.
- Laboratorios educativos sobre contenedores Docker.
- Presentación de proyectos personales o prototipos.

---

## 📜 Licencia

Este proyecto se publica bajo una licencia personalizada de **uso educativo y no comercial**.  
Consulta el archivo [LICENSE.md](LICENSE.md) para más detalles.

---

## 👤 Autor

**Francisco Javier Loscos Gil**  
Proyecto final – IES Pablo Serrano, 2024  
📧 meterre@gmail.com

---

## 🌐 Enlaces

- [Presentación del proyecto (PPTX)](https://github.com/Metr81/appcauldron/assets/presentacion)
- [Documentación técnica (PDF)](https://github.com/Metr81/appcauldron/assets/memoria)
