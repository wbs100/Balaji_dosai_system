import Swal from "sweetalert2";

export const ValidationMixin = {
    data() {
        return {
            validationErrors: {},
            validationMessage: null,
        };
    },
    methods: {
        resetValidationErrors() {
            this.validationErrors = {};
            this.validationMessage = null;
        },
        convertValidationNotification(error) {
            this.resetValidationErrors();
            if (!(error.response && error.response.data)) return;
            const { message } = error.response.data;
            this.errorMessage(message);
        },
        convertValidationError(err) {
            this.resetValidationErrors();
            if (!(err.response && err.response.data)) return;
            const { message, errors } = err.response.data;
            this.validationMessage = message;
            if (errors) {
                for (const error in errors) {
                    this.validationErrors[error] = errors[error][0];
                }
            }
        },
        successMessage(message) {
            Swal.fire({
                icon: "success",
                title: "Success",
                text: message,
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        },
        errorMessage(message) {
            Swal.fire({
                icon: "error",
                text: message,
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        },
    },
};
