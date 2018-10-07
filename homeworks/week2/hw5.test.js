var add = require('./hw5')

describe("hw5", function() {
  it("should return correct answer when a=111111111111111111111111111111111111 and b=111111111111111111111111111111111111", function() {
    expect(add('111111111111111111111111111111111111', '111111111111111111111111111111111111')).toBe('222222222222222222222222222222222222')
  });

  test("should return correct answer when a=9 and b=9", function() {
    expect(add('9', '9')).toBe('18')
  });

  test("should return correct answer when a=123 and b=456", function() {
    expect(add('123', '456')).toBe('579')
  });

  test("should return correct answer when a=105 and b=206", function() {
    expect(add('105', '206')).toBe('311')
  });
})
