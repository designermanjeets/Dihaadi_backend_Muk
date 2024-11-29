import {ref, onMounted} from 'vue'
export const useObserveSection = (callback) => {

    const section = ref()

    const calledOnce = ref(true)

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            if (entry.target === section.value) {
                if(typeof callback == 'function') {
                    if(calledOnce.value) {
                        callback()
                        calledOnce.value = false
                    }
                }
            }
          }
        });
      }, {threshold: 0});

    onMounted(() => {
        observer.observe(section.value)
    })

    return [section]
}
