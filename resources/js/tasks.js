import axios from "axios";

const API = {
    getCategories: (id) =>
        axios.get(`/tasks/category?category_id=${id}&page=${page}`),

    getTask: (id) => axios.get(`/tasks/${id}`),
    getCreateForm: () => axios.get("/tasks/create"),
    deleteTask: (id) => axios.delete(`/tasks/${id}`),
    setСomplete: (data) => axios.post("/tasks/set-complete", data),
};

let page = 1;

document.addEventListener("DOMContentLoaded", function () {
    const tasks = document.getElementById("tasks");
    const categories = document.getElementById("categories");
    const contents = document.getElementById("contents");

    categories.addEventListener("change", function () {
        page = 1;
        updateTaskList();
    });

    categories.dispatchEvent(new Event("change"));

    document.addEventListener("change", function (e) {
        if (e.target.classList.contains("task-status")) {
            const data = {
                id: e.target.dataset.id,
                value: +e.target.checked,
            };

            API.setСomplete(data).then((res) => {

                const id = res.data.id;
                const checked = res.data.value;
                const status = res.data.status;

                const statusName = document.getElementById('task-status-name');
                if (statusName) {
                    statusName.innerHTML = status;
                }

                const tasks = document.querySelectorAll(
                    `.task-status[data-id='${id}']`,
                );

                tasks.forEach(task => {

                    if (+task.checked === +checked) {
                        return;
                    }

                    task.checked = +checked;
                });
            });
        }
    });

    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("page-link")) {
            e.preventDefault();
            page = e.target.dataset.page;
            updateTaskList();
        }

        const task = e.target.closest(".task");
        if (task) {
            if (e.target.classList.contains("task-status")) {
                return;
            }

            API.getTask(task.dataset.id).then(
                (res) => (contents.innerHTML = res.data),
            );
        }

        if (e.target.classList.contains("add-button")) {
            e.preventDefault();
            API.getCreateForm().then((res) => (contents.innerHTML = res.data));
        }

        const deleteTaskButton = e.target.closest(".delete-task");
        if (deleteTaskButton) {
            e.preventDefault();

            if (!confirm("Действительно удалить?")) {
                return;
            }

            API.deleteTask(deleteTaskButton.dataset.id).then(() => {
                contents.innerHTML = "";
                updateTaskList();
            });
        }
    });

    function updateTaskList() {
        API.getCategories(categories.value, page).then(
            (res) => (tasks.innerHTML = res.data),
        );
    }

    // Функция для обновления содержимого <x-task.contents>
    function updateTaskContents(html) {
        const taskContents = document.getElementById("contents");
        if (taskContents) {
            taskContents.innerHTML = html;
        } else {
            console.error("Элемент с id 'contents' не найден!");
        }
    }

    function loadEditForm(taskUrl) {
        if (taskUrl) {
            fetch(taskUrl)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! status: ${response.status}`,
                        );
                    }
                    return response.text();
                })
                .then((html) => {
                    updateTaskContents(html); // Обновляем содержимое формой редактирования
                })
                .catch((error) => console.error("Error:", error));
        }
    }

    function attachEditIconListeners() {
        const taskContents = document.getElementById("contents");
        if (!taskContents) {
            console.warn(
                "Элемент с id 'contents' не найден. Невозможно добавить обработчики для редактирования.",
            );
            return;
        }
        // Делегирование события click для иконок редактирования
        taskContents.addEventListener("click", function (event) {
            const editIcon = event.target.closest(".feather-edit");
            if (editIcon) {
                event.preventDefault(); // Предотвращаем переход по ссылке, если это необходимо
                const taskUrl = editIcon.dataset.taskUrl; // taskUrl должен быть на иконке!
                console.log("Редактировать задачу с taskUrl:", taskUrl);
                loadEditForm(taskUrl); // Загружаем форму редактирования
            }
        });
    }

    // Вызываем функцию attachTrashIconListeners после загрузки нового контента
    function updateTaskContents(html) {
        const taskContents = document.querySelector("div.mail-contents");
        if (taskContents) {
            taskContents.innerHTML = html;
        }
    }

    // Инициализация обработчиков при загрузке страницы
    attachEditIconListeners();
});
