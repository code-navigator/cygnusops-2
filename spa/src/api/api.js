import axios from 'axios'
import urlClass from '@Api/url'

export default {
  // GET - request data
  async get (url, request) {
    const path = new urlClass(url, request);
    return await axios.get(path.pathWithQuery);
  },
  // POST - send data
  post (url, request) {
    const path = new url(url)
    return axios.post(path.path, request)
  },
  // PUT - insert data
  put (url, request) {
    const path = new url(url)
    return axios.put(path.path, request)
  },
  // PATCH - update data
  patch (url, request) {
    const path = new url(url)
    return axios.patch(path.path, request)
  },
  // DELETE - delete data
  delete (url, request) {
    const path = new url(url)
    return axios.delete(path.path, {data: request})
  }
}
