<template>
  <form @submit.prevent="submit" enctype="multipart/form-data">
    <!-- <input type="text" v-model="form.name" /> -->
    <input type="file" @input="form.avatar = $event.target.files[0]" />
    <div style="color:red;" v-if="errors.file">{{ errors.file }}</div>
    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
    </progress>
    <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
    <br><br>
    <section class="max-w-md mx-auto">
        <div v-for="f in file" :key="f.id">
            <div>{{ f.file }}</div>
            <img :src="'storage/avatar/'+ f.file" alt="image" style="width:50px ;height:50px">
        </div>
    </section>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    props: {
        errors: Object,
        file: Object,
    },
    setup () {
        const form = useForm({
        //   name: null,
        avatar: null,
    })

    function submit() {
      form.post('/file')
    }

    return { form, submit }
  },
}
</script>