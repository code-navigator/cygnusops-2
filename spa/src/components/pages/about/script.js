import api from '@Api/api'

export default {
  name: 'About',

  data() {
    return {
      text: '',
      revision: ''
    }
  },

  created: async function() {
      const response = api.get('wp-json/wp/v2/pages/152');
      console.log(await response.data);
  }
}
