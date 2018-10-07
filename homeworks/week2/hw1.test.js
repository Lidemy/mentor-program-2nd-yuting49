var stars = require('./hw1')

describe("hw1", function() {
  test("should return correct answer when n = 1", function() {
    expect(stars(1)).toEqual(['*'])
  });

  test("should return correct answer when n = 3", function() {
    expect(stars(3)).toEqual(["*", "**", "***"])
  });
  
  test("should return correct answer when n = 6", function() {
    expect(stars(6)).toEqual(["*", "**", "***", "****", "*****", "******"])
  });

})