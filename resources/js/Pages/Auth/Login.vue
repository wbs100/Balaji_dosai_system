<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head>
            <title>Log in</title>
            <link rel="icon" type="image/png" href="/assets/images/logo.png">
        </Head>

        <div class="authincation fix-wrapper"
            style="background-image: url('/assets/images/login_bg.jpg'); background-position: center; background-size: cover; min-height: 100vh;">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-md-6">
                        <div class="authincation-content shadow-lg bg-white rounded p-4">
                            <div class="text-center mb-3">
                                <img src="/assets/images/logo.png" alt="Logo" class="img-fluid" width="100px" />
                            </div>
                            <h4 class="text-center mb-4">Sign in to your account</h4>

                            <form @submit.prevent="submit">
                                <div class="mb-3">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" type="email" class="form-control" v-model="form.email"
                                        required autofocus autocomplete="username" />
                                    <InputError class="mt-2 text-danger" :message="form.errors.email" />
                                </div>

                                <div class="mb-3 position-relative">
                                    <InputLabel for="password" value="Password" />
                                    <TextInput id="password" type="password" class="form-control"
                                        v-model="form.password" required autocomplete="current-password" />
                                    <InputError class="mt-2 text-danger" :message="form.errors.password" />
                                </div>

                                <div class="form-row d-flex justify-content-between mb-3">
                                    <div class="form-check">
                                        <Checkbox id="remember" name="remember" v-model:checked="form.remember"
                                            class="form-check-input" />
                                        <label class="form-check-label ms-1" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <!-- <div>
                                        <Link
                                            v-if="canResetPassword"
                                            :href="route('password.request')"
                                            class="text-primary"
                                        >
                                            Forgot Password?
                                        </Link>
                                    </div> -->
                                </div>

                                <div class="text-center">
                                    <PrimaryButton class="btn btn-primary w-100"
                                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Log in
                                    </PrimaryButton>
                                </div>
                            </form>

                            <!-- <div class="new-account mt-4 text-center">
                                <p>
                                    Don’t have an account?
                                    <Link href="/register" class="text-primary">Sign Up</Link>
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
