# 🔮 AppCauldron

**Crea y gestiona tu stack de servicios IT con Docker a través de una interfaz web sencilla.**  
Proyecto final del Ciclo de Grado Superior en Administración de Sistemas Informáticos en Red (ASIR).

---

## 🚀 ¿Qué es AppCauldron?

AppCauldron es una solución web construida con Apache, PHP y Bash scripting que permite seleccionar servicios como Moodle, Wordpress, MySQL, entre otros, desde un formulario web. El sistema genera automáticamente una configuración `docker-compose.yaml` para orquestar estos servicios en contenedores.

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

appcauldron/
├── scripts/ # Scripts de automatización (bash)
├── templates/ # Plantillas YAML para servicios
├── public/ # Interfaz web (PHP + HTML)
├── spell.yaml # Ejemplo de salida generada
├── grimoire.txt # Documentación dinámica generada
├── README.md
└── LICENSE.md

---

## ⚙️ Requisitos

- Ubuntu 22.04 (usado en desarrollo)
- Apache2
- PHP
- Docker + docker-compose

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

- [Presentación del proyecto (PPTX)](https://github.com/tu_usuario/appcauldron/assets/presentacion)
- [Documentación técnica (PDF)](https://github.com/tu_usuario/appcauldron/assets/memoria)
