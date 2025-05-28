document.addEventListener("DOMContentLoaded", function () {
    const toggleLinks = document.querySelectorAll(".openInativarAtivar");
    const modalInativar = document.querySelector("#modalInativar");
    const modalAtivar = document.querySelector("#modalAtivar");
    const cancelarInativar = document.querySelector(".cancel-inativar");
    const cancelarAtivar = document.querySelector(".cancel-ativar");
    const confirmarInativacao = document.querySelector("#confirmarInativacao");
    const confirmarAtivacao = document.querySelector("#confirmarAtivacao");

    toggleLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();

            const idServico = link.getAttribute("data-id");
            const toggle = link.querySelector(".toggle-btn");

            if (!toggle) return;

            const isAtivo = toggle.classList.contains("active");

            if (isAtivo) {
                confirmarInativacao.setAttribute("data-id", idServico);
                modalInativar.classList.add("show");
            } else {
                confirmarAtivacao.setAttribute("data-id", idServico);
                modalAtivar.classList.add("show");
            }
        });
    });

    cancelarInativar?.addEventListener("click", () => {
        modalInativar.classList.remove("show");
        confirmarInativacao.removeAttribute("data-id");
    });

    cancelarAtivar?.addEventListener("click", () => {
        modalAtivar.classList.remove("show");
        confirmarAtivacao.removeAttribute("data-id");
    });

    confirmarInativacao?.addEventListener("click", () => {
        const id = confirmarInativacao.getAttribute("data-id");
        window.location.href = `../../../app/controller/ServicoController.php?id_servico=${id}&acao=inativar`;
    });

    confirmarAtivacao?.addEventListener("click", () => {
        const id = confirmarAtivacao.getAttribute("data-id");
        window.location.href = `../../../app/controller/ServicoController.php?id_servico=${id}&acao=ativar`;
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//     const toggleLinks = document.querySelectorAll(".openInativarAtivar");
//     const modalInativar = document.querySelector("#modalInativar");
//     const modalAtivar = document.querySelector("#modalAtivar");
//     const cancelarInativar = document.querySelector(".cancel-inativar");
//     const cancelarAtivar = document.querySelector(".cancel-ativar");
//     const confirmarInativacao = document.querySelector("#confirmarInativacao");
//     const confirmarAtivacao = document.querySelector("#confirmarAtivacao");

//     toggleLinks.forEach(link => {
//         link.addEventListener("click", (event) => {
//             event.preventDefault();

//             const idServico = link.getAttribute("data-id");
//             const toggle = link.querySelector(".toggle-btn");

//             if (!toggle) return;

//             const isAtivo = toggle.classList.contains("active");

//             if (isAtivo) {
//                 confirmarInativacao.setAttribute("data-id", idServico);
//                 modalInativar.classList.add("show");
//             } else {
//                 confirmarAtivacao.setAttribute("data-id", idServico);
//                 modalAtivar.classList.add("show");
//             }
//         });
//     });

//     cancelarInativar?.addEventListener("click", () => {
//         modalInativar.classList.remove("show");
//         confirmarInativacao.removeAttribute("data-id");
//     });

//     cancelarAtivar?.addEventListener("click", () => {
//         modalAtivar.classList.remove("show");
//         confirmarAtivacao.removeAttribute("data-id");
//     });

//     // Confirmar Inativação com AJAX
//     confirmarInativacao?.addEventListener("click", () => {
//         const id = confirmarInativacao.getAttribute("data-id");

//         // Enviando a requisição AJAX para inativar
//         sendRequest('inativar', id);

//         modalInativar.classList.remove("show"); // Fecha o modal
//     });

//     // Confirmar Ativação com AJAX
//     confirmarAtivacao?.addEventListener("click", () => {
//         const id = confirmarAtivacao.getAttribute("data-id");

//         // Enviando a requisição AJAX para ativar
//         sendRequest('ativar', id);

//         modalAtivar.classList.remove("show"); // Fecha o modal
//     });
    
//     // Função AJAX para enviar a requisição
//     function sendRequest(acao, id) {
//         const xhr = new XMLHttpRequest();
//         xhr.open('POST', '../../../app/controller/ServicoController.php', true); // Alterando a URL para a sua controller
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//         xhr.onreadystatechange = function () {
//             if (xhr.readyState === 4 && xhr.status === 200) {
//                 const resposta = xhr.responseText;

//                 if (resposta === "success") {
//                     alert('Status alterado com sucesso!');
//                     // Aqui você pode atualizar o status na tabela se necessário
//                     // Exemplo: Mudar o status visualmente na tabela
//                 } else {
//                     alert('Erro ao alterar o status.');
//                 }
//             }
//         };

//         // Envia a ação e o id para a controller
//         xhr.send(`acao=${acao}&id_servico=${id}`);
//     }
// });

// document.addEventListener("DOMContentLoaded", function () {
//     const toggleLinks = document.querySelectorAll(".openInativarAtivar");
//     const modalInativar = document.querySelector("#modalInativar");
//     const modalAtivar = document.querySelector("#modalAtivar");
//     const cancelarInativar = document.querySelector(".cancel-inativar");
//     const cancelarAtivar = document.querySelector(".cancel-ativar");
//     const confirmarInativacao = document.querySelector("#confirmarInativacao");
//     const confirmarAtivacao = document.querySelector("#confirmarAtivacao");

//     toggleLinks.forEach(link => {
//         link.addEventListener("click", (event) => {
//             event.preventDefault();

//             const idServico = link.getAttribute("data-id");
//             const toggle = link.querySelector(".toggle-btn");

//             if (!toggle) return;

//             const isAtivo = toggle.classList.contains("active");

//             if (isAtivo) {
//                 confirmarInativacao.setAttribute("data-id", idServico);
//                 modalInativar.classList.add("show");
//             } else {
//                 confirmarAtivacao.setAttribute("data-id", idServico);
//                 modalAtivar.classList.add("show");
//             }
//         });
//     });

//     cancelarInativar?.addEventListener("click", () => {
//         modalInativar.classList.remove("show");
//         confirmarInativacao.removeAttribute("data-id");
//     });

//     cancelarAtivar?.addEventListener("click", () => {
//         modalAtivar.classList.remove("show");
//         confirmarAtivacao.removeAttribute("data-id");
//     });

//     // Confirmar Inativação com AJAX
//     confirmarInativacao?.addEventListener("click", () => {
//         const id = confirmarInativacao.getAttribute("data-id");

//         // Enviar a requisição AJAX para inativar
//         sendRequest('inativar', id);

//         modalInativar.classList.remove("show"); // Fecha o modal
//     });

//     // Confirmar Ativação com AJAX
//     confirmarAtivacao?.addEventListener("click", () => {
//         const id = confirmarAtivacao.getAttribute("data-id");

//         // Enviar a requisição AJAX para ativar
//         sendRequest('ativar', id);

//         modalAtivar.classList.remove("show"); // Fecha o modal
//     });

//     // Função AJAX para enviar a requisição
//     function sendRequest(acao, id) {
//         const formData = new FormData();
//         formData.append("acao", acao);
//         formData.append("id_servico", id);

//         // Altere a URL para a controller correta e use o POST
//         fetch('../../../app/controller/ServicoController.php', {
//             method: 'POST',
//             body: formData
//         })
//         .then(res => res.json())  // Esperando resposta no formato JSON
//         .then(response => {
//             if (response.status === "success") {
//                 alert(response.message); // Mensagem de sucesso
//                 location.reload(); // Recarregar a página ou atualizar visualmente
//             } else {
//                 alert('Erro ao alterar o status do serviço.');
//             }
//         })
//         .catch(error => {
//             console.error('Erro ao enviar a requisição:', error);
//             alert('Ocorreu um erro. Tente novamente.');
//         });
//     }
// });
