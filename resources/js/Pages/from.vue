<template>
    <div>
<Head title="From" />
         <div class="container">
            <form @submit.prevent="submit">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div style="color:red;" v-if="errors.email">{{ errors.email }}</div>
                <h1 style="color:green;" v-if="d">{{ d }}</h1>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="block mt-4">
                    <label class="flex items-center">
                        <BreezeCheckbox name="remember" v-model:checked="form.check" />

                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                <!-- register and login janina kivabe processing ne error dicha na. kintu amarta korar jono processing ke form modha rekha false korte hobe -->
                    Register
                </BreezeButton>
            </form>
        </div>
        <!-- </BreezeAuthenticatedLayout> -->
    </div>
</template>
<script>

import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head , Link} from '@inertiajs/inertia-vue3';
import BreezeButton from '@/Components/Button.vue'
export default {
     props: {
        errors: Object,
        d:null
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        BreezeButton,
        BreezeCheckbox,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                check: false,
                processing: false,//register and login janina kivabe processing ne error dicha na. kintu amarta korar jono processing ke form modha rekha false korte hobe
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('from'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
