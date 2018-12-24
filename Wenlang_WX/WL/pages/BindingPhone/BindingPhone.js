// pages/BindingPhone/BindingPhone.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    
      color: "#2476E3",
      disabled: false,
      getCode: "获取验证码",
   
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
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