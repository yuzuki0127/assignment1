    document.addEventListener('DOMContentLoaded', () => {
        const choiceButtons = document.querySelectorAll('.choice-button');

        choiceButtons.forEach(button => {
            button.addEventListener('click', event => {
                console.log("bbb");
                const isCorrect = event.target.getAttribute('data-correct') === '1';
                if (isCorrect) {
                    Swal.fire({
                        icon: "success",
                        title: "正解！",
                        timer: 1500,
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "不正解..",
                        timer: 1500,
                    });
                }
            });
        });
    });