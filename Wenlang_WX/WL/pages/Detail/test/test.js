// pages/Detail/test/test.js

Page({

  /**
   * 页面的初始数据
   */
  data: {
    color: "#ff6f10",
    disabled: false,
    getCode: "获取验证码",
    heigth: 40,
    showMore: false,
    rankList: ['1','2','3'],//这里面的数据是通过请求获取的    
    tip: '测试',
    userName: '用户名：',
    psw: '密码：',
    phone: '',
    password: '',
    items: [
      { name: '男', checked: false }
    ],


  },
  phoneInput: function (e) {
    this.setData({
      phone: e.detail.value
    })
  },
  menuClick: function (e) {
    this.setData({
      _num: e.target.dataset.num
    })
  },
  // 获取输入密码
  passwordInput: function (e) {
    this.setData({
      password: e.detail.value
    })
  },
  login: function () {
    if (this.data.phone.length == 0 || this.data.password.length == 0) {
      wx.showToast({
        title: '用户名和密码不能为空',
        icon: 'loading',
        duration: 2000
      })
    } else {
      // 这里修改成跳转的页面
      wx.showToast({
        title: '登录成功',
        icon: 'success',
        duration: 2000
      })
    }
  },
  listToggle: function () {
    this.setData({
      showMore: !this.data.showMore
    })
  },
  formBindsubmit: function (e) {
    this.setData({
      tip: '结果',
      userName: '用户名：' + e.detail.value.userName,
      psw: '密码：' + e.detail.value.psw
    })
  },
  formReset: function () {
    this.setData({
      tip: '清空了',
      userName: '君不见',
      psw: '黄河之水天上来'
    })
  },
  spread: function () {
    var that = this
    that.setData({
      height: '300rpx'
    })
  },
  // all: function () {
  //   var that = this
  //   that.setData({
  //     height: 100,
  //     showMore: !this.data.showMore
  //   })
  // },
  // alls: function () {
  //   var that = this
  //   that.setData({
  //     height: 40,
  //   })
  // },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },

 
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  },
  sendCode: function (e) {
    var that = this;
    var times = 0
    var i = setInterval(function () {
      times++
      if (times >= 60) {
        that.setData({
          color: "#ff6f10",
          disabled: false,
          getCode: "获取验证码",
        })
        clearInterval(i)
      } else {
        that.setData({
          getCode: "重新获取" + times + "s",
          color: "#999",
          disabled: true
        })
      }
    }, 1000)
  },

})

