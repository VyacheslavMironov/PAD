import { mount } from '@vue/test-utils'
import  App from './app.vue'

  describe('Mounted App', () => {
    const wrapper = mount(App);
  
    test('does a wrapper exist', () => {
      expect(wrapper.exists()).toBe(true)
    })
    it('renders the correct markup', () => {
      expect(wrapper.html()).toContain('What is the sum of the two numbers?')
    })
    it('has a button', () => {
      expect(wrapper.find('ButtonComponent').exists()).toBe(true)
    })
  })

  