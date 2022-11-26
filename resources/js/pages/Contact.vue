<template>
  <div class="contact-page">
      <v-container class="grey lighten-4 pa-10">
          <v-row>
            <v-col cols="12" sm="12" md="12" lg="12">
                <h1 class="black--text"> Contact </h1>
                <v-divider class="ma-2"></v-divider>
                  <v-form>
                    <v-container>
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-text-field class="font-thai"
                                    v-model="form.first_name"
                                    :error-messages="firstNameErrors"
                                    label="ชื่อ"
                                    required
                                    @input="$v.form.first_name.$touch()"
                                    @blur="$v.form.first_name.$touch()"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-text-field class="font-thai"
                                    v-model="form.last_name"
                                    :error-messages="lastNameErrors"
                                    label="นามสกุล"
                                    required
                                    @input="$v.form.last_name.$touch()"
                                    @blur="$v.form.last_name.$touch()"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" md="12">
                                    <v-text-field class="font-thai"
                                    v-model="form.email"
                                    :error-messages="emailErrors"
                                    label="อีเมล์"
                                    required
                                    @input="$v.form.email.$touch()"
                                    @blur="$v.form.email.$touch()"
                                    ></v-text-field>
                             </v-col>
                            <v-col cols="12" md="12">
                                  <v-text-field class="font-thai"
                                    v-model="form.tel"
                                    :error-messages="telErrors"
                                    label="เบอร์โทร"
                                    required
                                    type="tel"
                                    @input="$v.form.tel.$touch()"
                                    @blur="$v.form.tel.$touch()"
                                    v-mask="'##########'"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" md="12">
                                  <v-textarea class="font-thai"
                                    v-model="form.detail"
                                    :error-messages="detailErrors"
                                    label="รายละเอียดที่ติดต่อ"
                                    required
                                    @input="$v.form.detail.$touch()"
                                    @blur="$v.form.detail.$touch()"
                                ></v-textarea>
                            </v-col>
                            <v-col cols="12" md="12" class="mt-5">
                                <v-btn class="mr-4 font-thai" color="success" @click="submit"> Submit </v-btn>
                                <v-btn class="mr-4 font-thai" @click="clear"> Reset </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                 </v-form>
            </v-col>
          </v-row>
        <v-dialog v-model="load" persistent width="300">
            <v-card color="light-green darken-3">
                <v-card-text class="text-center">
                    <p class="font-thai white--text pa-5"> กรุณารอสักครู่ </p>
                    <v-progress-linear indeterminate color="white" class="mt-2 mb-2"></v-progress-linear>
                </v-card-text>
            </v-card>
        </v-dialog>
      </v-container>
  </div>
</template>

<script>
  import { required, email, numeric, maxLength } from 'vuelidate/lib/validators'
  import { CREATE_CONTACT } from "@store/actions.type";
  import { mask } from 'vue-the-mask';
  export default {
    directives: {
      mask,
    },
    validations: {
        form: {
            first_name : { required },
            last_name  : { required },
            email      : { required, email   },
            tel        : { required, numeric, maxLength: maxLength(10) },
            detail     : { required }
        }
    },
    data: () => ({
      load : false,
      form : {
        first_name : '',
        last_name  : '',
        email      : '',
        tel        : '',
        detail     : '',
      }
    }),
    computed: {
        firstNameErrors () {
            const errors = []
            if (!this.$v.form.first_name.$dirty) return errors
            !this.$v.form.first_name.required && errors.push('โปรดระบุชื่อ')
            return errors
        },
        lastNameErrors () {
            const errors = []
            if (!this.$v.form.last_name.$dirty) return errors
            !this.$v.form.last_name.required && errors.push('โปรดระบุนามสกุล')
            return errors
        },
        emailErrors () {
            const errors = []
            if (!this.$v.form.email.$dirty) return errors
            !this.$v.form.email.required && errors.push('โปรดระบุอีเมล์')
            !this.$v.form.email.email    && errors.push('โปรดระบุข้อมูลรูปแบบอีเมล์')
            return errors
        },
        telErrors() {
            const errors = [];
            if (!this.$v.form.tel.$dirty) return errors;
            !this.$v.form.tel.required  && errors.push("โปรดระบุเบอร์โทร");
            !this.$v.form.tel.numeric   && errors.push('โปรดระบุข้อมูลเป็นตัวเลข')
            !this.$v.form.tel.maxLength && errors.push('โปรดระบุตัวเลขไม่เกิน 10 หลัก')
            return errors;
        },
        detailErrors() {
            const errors = [];
            if (!this.$v.form.detail.$dirty) return errors;
            !this.$v.form.detail.required  && errors.push("โปรดระบุรายละเอียดที่ติดต่อ");
            return errors;
        }
    },
    methods: {
        submit () {
            this.$v.$touch()
            if (this.$v.form.$pending || this.$v.form.$error) return;
            this.loader()
            this.send()
        },
        clear () {
            this.$v.form.$reset()
            this.form.first_name = ''
            this.form.last_name  = ''
            this.form.email      = ''
            this.form.tel        = ''
            this.form.detail     = ''
        },
        send() {
            this.$store.dispatch(CREATE_CONTACT, this.form)
            .then((response) => response == "success" ? this.success() : this.error())
            .catch((error) => console.log(error))
        },
        loader() {
            this.load = true;
            setTimeout(() => (this.load = false), 1500);
        },
        success() {
           setTimeout(() =>
                this.$swal.fire({
                    type: "success",
                    title: "ส่งข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                }),
                1500
            );
            this.clear()
        },
        error() {
            this.$swal({
                type: "error",
                title: "บันทึกไม่สำเร็จ กรุณาติดต่อผู้ดูแลระบบ",
                showConfirmButton: true,
                reverseButtons: true
            });
        }
    },
  }
</script>
