$('[data-action="delete"]').each(function (element) {
    if ($(this).data('is-initiated')) {
        return;
    }
    $(this).on("click", function () {
        const dataName = $(this).data("name");
        const tableId = $(this).data("table-id");
        const url = $(this).data("url");
        const csrf = $('meta[name="csrf-token"]').attr("content");
        Swal.fire({
            text: 'Apakah anda yakin untuk menghapus "' + dataName + '"?',
            icon: "warning",
            showCancelButton: true,
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": csrf,
                    },
                });
                $.ajax({
                    url: url,
                    type: "DELETE",
                    beforeSend: function () {
                        showPageOverlay();
                    },
                    success: function (response) {
                        window.LaravelDataTables[`${tableId}`].draw();
                        Swal.fire({
                            text: response.message?.body,
                            title: response.message?.title,
                            icon: "success",
                            confirmButtonText: "Close",
                        });
                    },
                    error: function (response) {
                        handleAjaxError(response);
                    },
                    complete: function () {
                        hidePageOverlay();
                    },
                });
            }
        });
    });
    $(this).data('is-initiated', true);
});

$('button[data-action="edit"]').each(function (element) {
    if ($(this).data('is-initiated')) {
        return;
    }
    $(this).on("click", function (ev) {
        ev.preventDefault();
        const { url, target } = $(this).data();
        let description = $(this).data("description");
        showPageOverlay();
        $.ajax({
            url: url,
            method: "GET",
            dataType: "json",
            timeout: 2000,
            success: function (data) {
                const form = $(`${target} form`);
                const exceptFields = {};
                const formAction = form.attr("action");

                try {
                    description = decodeURIComponent(atob(description));
                } catch (Exception) {}
                form.find('.description').html(description);
                if (description != "") {
                    form.find('.desc-container').show();
                } else {
                    form.find('.desc-container').hide();
                }
                form.find('select[data-plugin="select-2"][data-source]').each(
                    function () {
                        const name = $(this).attr("name");
                        exceptFields[name] = {
                            value: data[name].value,
                            label: data[name].label,
                        };
                    }
                );

                fillForm(form, data, exceptFields);
                form.attr("action", formAction.replace(/\{id\}/, data.id));

                $(target).modal("show");
            },
            error: function (jqXhr) {
                handleAjaxError(jqXhr);
            },
            complete: hidePageOverlay,
        });
        $(this).data('is-initiated', true);
    });
    $(this).data('is-initiated', true);
});


$('[data-action="search"]').on(
    "input",
    debounce(function () {
        const tableId = $(this).data("table-id");
        window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
    }, 1000)
);

$('[data-action="restore"]').each(function (element) {
    if ($(this).data('is-initiated')) {
        return;
    }
    $(this).on("click", function () {
        const dataName = $(this).data("name");
        const tableId = $(this).data("table-id");
        const url = $(this).data("url");
        const csrf = $('meta[name="csrf-token"]').attr("content");
        Swal.fire({
            text: 'Apakah Anda yakin ingin memulihkan "' + dataName + '"?',
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-secondary",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": csrf,
                    },
                });
                $.ajax({
                    url: url,
                    type: "PUT",
                    success: function (response) {
                        window.LaravelDataTables[`${tableId}`].draw();
                        if (typeof response.success === "string") {
                            Swal.fire({
                                text: response.success,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Close",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        } else {
                            Swal.fire({
                                text: response.message?.body,
                                icon: "success",
                                title: response.message?.title,
                                buttonsStyling: false,
                                confirmButtonText: "Yes",
                                cancelButtonText: "No",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    },
                    error: function (response) {
                        handleAjaxError(response);
                    },
                });
            }
        });
    });
    $(this).data('is-initiated', true);
});

$('[data-action="upload"]').each(function (element) {
    if ($(this).data('is-initiated')) {
        return;
    }
    $(this).on("click", function () {
        const url = $(this).data("url");
        const modal = $(this).data("modal-id");
        const title = $(this).data("title");
        let description = $(this).data("description");

        try {
            description = decodeURIComponent(atob(description));
        } catch (Exception) {}
        // set action form
        $(`#${modal} form`).attr("action", url);
        $(`#${modal} form`).find('.modal-title').text(title);
        $(`#${modal} form`).find('.label-title').text(title);
        $(`#${modal} form`).find('.description').html(description);
        if (description != "") {
            $(`#${modal} form`).find('.desc-container').show();
        } else {
            $(`#${modal} form`).find('.desc-container').hide();
        }
        // show modal
        $(`#${modal}`).modal("show");
    });
    $(this).data('is-initiated', true);
});
