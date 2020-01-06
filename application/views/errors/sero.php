import React, { Component } from 'react'
import { Input, Menu } from 'semantic-ui-react'

export default class MenuExampleSecondary extends Component {
  state = { activeItem: 'home' }

  handleItemClick = (e, { name }) => this.setState({ activeItem: name })

  render() {
    const { activeItem } = this.state

    return (
      <Menu secondary>
        <Menu.Item name='home' active={activeItem === 'home'} onClick={this.handleItemClick} />
        <Menu.Item
          name='messages'
          active={activeItem === 'messages'}
          onClick={this.handleItemClick}
        />
        <Menu.Item
          name='friends'
          active={activeItem === 'friends'}
          onClick={this.handleItemClick}
        />
        <Menu.Menu position='right'>
          <Menu.Item>
            <Input icon='search' placeholder='Search...' />
          </Menu.Item>
          <Menu.Item
            name='logout'
            active={activeItem === 'logout'}
            onClick={this.handleItemClick}
          />
        </Menu.Menu>
      </Menu>
    )
  }
}

//container with justify align

/* eslint-disable max-len */

import React from 'react'
import { Container, Divider } from 'semantic-ui-react'

const ContainerExampleAlignment = () => (
  <div>
    <Container textAlign='left'>Left Aligned</Container>
    <Container textAlign='center'>Center Aligned</Container>
    <Container textAlign='right'>Right Aligned</Container>
    <Container textAlign='justified'>
      <b>Justified</b>
      <Divider />
      <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
        Aenean massa strong. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
        consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
        arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
        pede link mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
        Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
        ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra
        nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
        augue. Curabitur ullamcorper ultricies nisi.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
        Aenean massa strong. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
        consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
        arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
        pede link mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
        Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
        ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra
        nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
        augue. Curabitur ullamcorper ultricies nisi.
      </p>
    </Container>
  </div>
)

export default ContainerExampleAlignment

//boutton
<div>
  <button class="ui primary button">Primary</button>
  <button class="ui secondary button">Secondary</button>
</div>

//divider

<div class="ui basic center aligned segment">
  <div class="ui action left icon input">
    <input type="text" placeholder="Order #" />
    <i aria-hidden="true" class="search icon"></i>
    <button class="ui blue button">Search</button>
  </div>
  <div class="ui horizontal divider">Or</div>
  <button class="ui teal icon left labeled button">
    <i aria-hidden="true" class="add icon"></i>
    Create New Order
  </button>
</div>

//modal
<>
  <Modal trigger={<Button>Show</Button>} content="Content" />
  // 💡 has identical effect to the previous one
  <Modal trigger={<Button>Show</Button>} content={{ content: 'Content' }} />
  // ⛔ example below has broken styling, see section about React Element
  <Modal trigger={<Button>Show</Button>} content={<div>Content</div>} />
</>

//MODAL

import React, { Component } from 'react'
import { Button, Header, Icon, Modal } from 'semantic-ui-react'

export default class ModalExampleControlled extends Component {
  state = { modalOpen: false }

  handleOpen = () => this.setState({ modalOpen: true })

  handleClose = () => this.setState({ modalOpen: false })

  render() {
    return (
      <Modal
        trigger={<Button onClick={this.handleOpen}>Show Modal</Button>}
        open={this.state.modalOpen}
        onClose={this.handleClose}
        basic
        size='small'
      >
        <Header icon='browser' content='Cookies policy' />
        <Modal.Content>
          <h3>This website uses cookies to ensure the best user experience.</h3>
        </Modal.Content>
        <Modal.Actions>
          <Button color='green' onClick={this.handleClose} inverted>
            <Icon name='checkmark' /> Got it
          </Button>
        </Modal.Actions>
      </Modal>
    )
  }
}
<button class="ui button">Show Modal</button>

//MODAL AGAIN

import React from 'react'
import { Button, Modal } from 'semantic-ui-react'

const ModalExampleShorthand = () => (
  <Modal
    trigger={<Button>Show Modal</Button>}
    header='Reminder!'
    content='Call Benjamin regarding the reports.'
    actions={['Snooze', { key: 'done', content: 'Done', positive: true }]}
  />
)

export default ModalExampleShorthand

<button class="ui button">Show Modal</button>
