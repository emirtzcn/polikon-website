// Signature-style SVG mark for the hero slogan.
// Rendered as SVG text (Homemade Apple) so size/fade/vertical alignment are
// fully controlled and never clip or reflow like inline flex text did.
// Shared by both EN and TR so the two languages render pixel-identical format.
export default function HeroSignature({ className = '', text = 'Expertise in Every Layer' }) {
  return (
    <svg
      className={`hero-signature ${className}`}
      viewBox="0 0 1120 266"
      role="img"
      aria-label={text}
    >
      <defs>
        <linearGradient id="heroSigFade" x1="0" y1="0" x2="1" y2="0">
          <stop offset="0%" stopColor="#fff" />
          <stop offset="96%" stopColor="#fff" />
          <stop offset="100%" stopColor="#000" />
        </linearGradient>
        <mask id="heroSigMask">
          <rect x="0" y="0" width="1120" height="266" fill="url(#heroSigFade)" />
        </mask>
      </defs>
      <text
        x="10"
        y="166"
        fontFamily="'Homemade Apple', cursive"
        fontSize="78"
        fill="#f0731a"
        mask="url(#heroSigMask)"
      >
        {text}
      </text>
      <g mask="url(#heroSigMask)" stroke="#f0731a" strokeLinecap="round" fill="none" opacity="0.7">
        <path d="M1058 169 q 14 4 24 -2" strokeWidth="2.2" />
        <path d="M1060 174 q 12 8 20 6" strokeWidth="1.4" opacity="0.8" />
        <path d="M1055 163 q 16 -3 22 -9" strokeWidth="1.1" opacity="0.6" />
      </g>
    </svg>
  )
}
